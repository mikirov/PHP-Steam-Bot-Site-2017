const SteamUser = require('steam-user');
const SteamTotp = require('steam-totp');
const SteamCommunity = require('steamcommunity');
const TradeOfferManager = require('steam-tradeoffer-manager');
const config = require('./config.json');

const client = new SteamUser();
const community = new SteamCommunity();
const manager = new TradeOfferManager({
	steam: client,
	community: community,
	language: 'en'
});
const partnerid = process.argv[2];
const assetids = process.argv.splice(3);
const logOnOptions = {
	accountName: config.username,
	password: config.password,
	twoFactorCode: SteamTotp.generateAuthCode(config.sharedSecret)
};

client.logOn(logOnOptions);

client.on('loggedOn', () => {
	console.log('Logged into Steam');

	client.setPersona(SteamUser.Steam.EPersonaState.Online);
	client.gamesPlayed(440);
});

client.on('webSession', (sessionid, cookies) => {
	manager.setCookies(cookies);

	community.setCookies(cookies);
	community.startConfirmationChecker(10000, config.idSecret);
	sendoffer(assetids, partnerid);
});

manager.on('newOffer', (offer) => {
	if (offer.partner.getSteamID64() === '76561198091881701') {
	offer.accept((err, status) => {
		if (err) {
			console.log(err);
		} else {
			console.log(`Accepted offer. Status: ${status}.`);
		}
	});
	}
	if (offer.itemsToGive.length === 0) {
		offer.accept((err, status) => {
			if (err) {
				console.log(err);
			} else {
				console.log(`Donation accepted. Status: ${status}.`);
			}
		});
	} else {
		offer.decline((err) => {
			if (err) {
				console.log(err);
			} else {
				console.log('Donation declined (wanted our items).');
			}
		});
	}
});

console.log(assetids);
function sendoffer(assetids, partnerid){
	const appid = 730;
	const contextid = 2;
	const offer = manager.createOffer(partnerid);
		manager.loadUserInventory(partnerid, appid, contextid, true, (err, inv) => {
			if (err) {
				console.log(err);
			} else {
				var loaded = 1;
				for(i=0;i<assetids.length;i++){
					var item = inv.find((item) => item.assetid == assetids[i]);
					if (item) {
						offer.addTheirItem(item);
					} else {
						loaded = 0;
					}
				}
				if(loaded){
					offer.setMessage('Deposit item on the website!');
					offer.send((err) => {
						if(err){
							console.log(err);
						}
					});
				}
				else{
					console.log("couldnt send trade offer");
				}
			}
		});
}
