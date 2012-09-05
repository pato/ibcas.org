var cycle = {
	invids: '0',
	cycID: 0
}

var ads = {
	received: 0,
	getAds: function() {
		if(typeof cycle.partnerInfo !== 'undefined' && cycle.cycID <= cycle.partnerInfo.length) {
			if(ads.received < ads.needed) {
				$pCents.getJSON('http://ad1.pocketcents.net/lab/pCentsLoader.php?callback=?', {
					cycID: cycle.cycID,
					labID: lab.labID,
					partnerID: cycle.partnerInfo[cycle.cycID - 1]['partnerID'],
					emptySpaces: ads.needed - ads.received,
					userBrowser: visitor.browser,
					userSystem: visitor.system,
					ipAddress: visitor.ipAddress,
					categoryID: lab.categoryID,
					category: lab.category,
					mobile: lab.mobile,
					newWindow: lab.newWindow,
					gender: lab.gender,
					clickRate: lab.clickRate,
					adType: lab.adType,
					labType: lab.labType,
					url: lab.url,
					locationID: visitor.locationID,
					latitude: visitor.latitude,
					longitude: visitor.longitude,
					city: visitor.city,
					country: visitor.country,
					countryCode: visitor.countryCode,
					inventory: cycle.invids
				}, function(data) {
					cycle.cycID++;
					
					for(var i=0; i < data.length; i++) {
						ads.printAds(data[i], i);
					}
					
					if( typeof cycle.partnerInfo !== 'undefined' && cycle.cycID <= cycle.partnerInfo.length ) {
						ads.getAds();
					} else {
						ads.checkAds();
					}
				});
			} else {
				// Nothing
			}
		} else {
			ads.checkAds();
		}
	},
	printAds: function(data, i) {
		if (ads.needed > ads.received) {
			if( data.invid ) cycle.invids += ',' + data.invid;
			
			if (data['adType'] == 'textAd') {
				ads.textAd(data); ads.received++;
			} else if (data['adType'] == 'hybridAd') {
				ads.hybridAd(data); ads.received++;
			} else if (data['adType'] == 'imageAd') {
				ads.imageAd(data); ads.received++;
			} else if (data['adType'] == 'flash') {
				ads.flashAd(data); ads.received = ads.needed;
			} else {
				//Error
			}
		}
	},
	textAd: function(data) {
		var i = Math.floor(Math.random() * 1000);
		data['name'] = ads.toTitleCase(data['name']);
        $pCents('#pcentslab').append('<div id=\"' + data['adID'] + cycle.cycID + i + '\">');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('display', 'none');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('margin', ads.margins);
            $pCents('#' + data['adID'] + cycle.cycID + i).css('backgroundColor', ads.adBackColor);
            $pCents('#' + data['adID'] + cycle.cycID + i).css('cursor', 'pointer');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('width', '150px');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('height', '80px');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('float', 'left');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('line-height', '95%');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('overflow', 'hidden');
                $pCents('#' + data['adID'] + cycle.cycID + i).append('<div id=\"' + data['adID'] + cycle.cycID + i + '_name\" style=\"\">' + data['name'] + '</div>');
                $pCents('#' + data['adID'] + cycle.cycID + i).append('<div id=\"' + data['adID'] + cycle.cycID + i + '_description\" style=\"\">' + data['description'] + '</div>');
                $pCents('#' + data['adID'] + cycle.cycID + i).append('<div id=\"' + data['adID'] + cycle.cycID + i + '_link\" style=\"\">' + data['link'] + '</div>');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('overflow', 'hidden');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('font-size', '11px');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('font-weight', 'bold');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('padding', '2px 1px 0px 2px');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('color', ads.adTitleColor);
                $pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('overflow', 'hidden');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('font-size', '10px');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('padding', '0px 0px 0px 2px');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('color', ads.adTextColor);
                $pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('overflow', 'hidden');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('font-size', '10px');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('font-weight', 'bold');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('padding', '1px 0px 0px 2px');
                $pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('color', ads.adLinkColor);
        $pCents('#pcentslab').append('</div>');
        $pCents('#' + data['adID'] + cycle.cycID + i).fadeIn(2000);
        ads.onClick(data, i);
    },
    hybridAd: function(data) {
		var i = Math.floor(Math.random() * 1000);
		data['name'] = ads.toTitleCase(data['name']);
		$pCents('#pcentslab').append('<div id=\"' + data['adID'] + cycle.cycID + i + '\">');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('display', 'none');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('margin', ads.margins);
            $pCents('#' + data['adID'] + cycle.cycID + i).css('background-color', ads.adBackColor);
            $pCents('#' + data['adID'] + cycle.cycID + i).css('cursor', 'pointer');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('width', '150px');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('height', '80px');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('float', 'left');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('overflow', 'hidden');
				if(data['image']) $pCents('#' + data['adID'] + cycle.cycID + i).append('<div id=\"image_' + data['adID'] + cycle.cycID + i + '\" style=\"\"><img src=\"' + data['image'] + '\" height=\"80\" style=\"max-width: none; margin-left:-20px\" /></div>');
				else $pCents('#' + data['adID'] + cycle.cycID + i).append('<div id=\"image_' + data['adID'] + cycle.cycID + i + '\" style=\"\"><img src=\"http://pocketcents.com/ad1/image.php?id=' + data['hybridImageID'] + '\" width=\"50\" height=\"80\" /></div>');
				$pCents('#image_' + data['adID'] + cycle.cycID + i).css('width', '50px');
				$pCents('#image_' + data['adID'] + cycle.cycID + i).css('height', '80px');
				$pCents('#image_' + data['adID'] + cycle.cycID + i).css('float', 'left');
				$pCents('#image_' + data['adID'] + cycle.cycID + i).css('overflow', 'hidden');
				$pCents('#' + data['adID'] + cycle.cycID + i).append('<div id=\"text_' + data['adID'] + cycle.cycID + i + '\">');
					$pCents('#text_' + data['adID'] + cycle.cycID + i).append('<div id=\"' + data['adID'] + cycle.cycID + i + '_name\" style=\"\">' + data['name'] + '</div>');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('overflow', 'hidden');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('font-size', '11px');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('font-weight', 'bold');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('padding', '0px 0px 0px 2px');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_name').css('color', ads.adTitleColor);
					$pCents('#text_' + data['adID'] + cycle.cycID + i).append('<div id=\"' + data['adID'] + cycle.cycID + i + '_description\" style=\"\">' + data['description'] + '</div>');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('overflow', 'hidden');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('font-size', '10px');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('padding', '0px 0px 0px 2px');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_description').css('color', ads.adTextColor);
					$pCents('#text_' + data['adID'] + cycle.cycID + i).append('<div id=\"' + data['adID'] + cycle.cycID + i + '_link\" style=\"\">' + data['link'] + '</div></div>');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('overflow', 'hidden');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('font-size', '11px');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('padding', '0px 0px 0px 2px');
						$pCents('#' + data['adID'] + cycle.cycID + i + '_link').css('color', ads.adLinkColor);
		$pCents('#pcentslab').append('</div>');
		$pCents('#' + data['adID'] + cycle.cycID + i).fadeIn(2000);
		ads.onClick(data, i);
	},
	imageAd: function(data) {
		var i = Math.floor(Math.random() * 1000);
		$pCents('#pcentslab').append('<div id=\"' + data['adID'] + cycle.cycID + i + '\" style=\"\">');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('display', 'none');
            $pCents('#' + data['adID'] + cycle.cycID + i).css('margin', ads.margins);
			$pCents('#' + data['adID'] + cycle.cycID + i).css('cursor', 'pointer');
			$pCents('#' + data['adID'] + cycle.cycID + i).css('background-color', '#FFF');
			$pCents('#' + data['adID'] + cycle.cycID + i).css('width', '150px');
			$pCents('#' + data['adID'] + cycle.cycID + i).css('height', '80px');
			$pCents('#' + data['adID'] + cycle.cycID + i).css('float', 'left');
				$pCents('#' + data['adID'] + cycle.cycID + i).append('<img src=\"http://pocketcents.com/ad1/image.php?id=' + data['imageID'] + '\" width=\"150\" height=\"80\" />');
		$pCents('#pcentslab').append('</div>');
		$pCents('#' + data['adID'] + cycle.cycID + i).fadeIn(2000);
		ads.onClick(data, i);
	},
	flashAd: function(data) {
		var i = Math.floor(Math.random() * 1000);
		$pCents('#pcentslab').append('<div id=\"' + data['adID'] + cycle.cycID + i + '\" style=\"\">');
		$pCents('#' + data['adID'] + cycle.cycID + i).append(data['description']);
		$pCents('#pcentslab').append('</div>');
	},
    toTitleCase: function(str) {
		return str.replace(/(?:^|\s)\w/g, function(match) {
			return match.toUpperCase();
		});
	},
	onClick: function(data, i) {
		if(data['bid'] == undefined) data['bid'] = 0.25;
		if(data['keywordID'] == undefined) data['keywordID'] = 'false';
		$pCents('#' + data['adID'] + cycle.cycID + i).click(function() {
			if(data['action'] == 'video') {
				$pCents.fancybox([{
					'modal' : 'true',
					'type'	: 'iframe',
					'width' : 580,
					'height': 350,
					'href'	: clickURL + 'http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=' + data['adID'] + '&category=' + lab.category + '&partner=' + data['Provider'] + '&url=' + escape(data['url']) + '&action=' + data['action'] + '&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=' + data['bid'] + '&key=' + data['keywordID'] + '&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode,
					'title'	: 'Title',
					'titleFormat'       : function(title, currentArray, currentIndex,
										currentOpts) {
										   return '<a style="text-decoration: none; color: #FFF; font-weight: bold; font-size: 16px;" href="' + data['link'] + '" target="_blank">' + data['link'] + '</a>';
										} 
				}]);
			} else if(data['action'] == 'coupon') {
				window.open(clickURL + 'http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=' + data['adID'] + '&category=' + lab.category + '&partner=' + data['Provider'] + '&url=' + escape(data['url']) + '&action=' + data['action'] + '&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=' + data['bid'] + '&key=' + data['keywordID'] + '&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode);
			} else if(data['action'] == 'hyperLink') {
				url = clickURL + 'http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=' + data['adID'] + '&category=' + lab.category + '&partner=' + data['Provider'] + '&url=' + escape(data['url']) + '&action=' + data['action'] + '&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=' + data['bid'] + '&key=' + data['keywordID'] + '&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode;
				if(lab.newWindow == 1) window.open(url, '_blank');
				else window.open(url, '_parent');
			} else {
				url = clickURL + 'http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=' + data['adID'] + '&category=' + lab.category + '&partner=' + data['Provider'] + '&url=' + escape(data['url']) + '&action=' + data['action'] + '&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=' + data['bid'] + '&key=' + data['keywordID'] + '&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode;
				if(lab.newWindow == 1) window.open(url, '_blank');
				else window.open(url, '_parent');
			}
		});
	},
	checkAds: function() { 
		if( ads.received < ads.needed ) {
			if( ads.received == 0 && lab.labType != 'pCents' && lab.labType != 'mobile' ) {
				if(lab.labType == 'leaderboard') {
					$pCents('#pcentslab').width(726);
					$pCents('#pcentslab').height(90);
					$pCents('#pcentslab').html('');
					//var labimg = '<a href="http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=662&category=' + lab.category + '&partner=pCents&url=' + escape('http://pocketcents.com/Services/Local-Online-Advertising') + '&action=hyperLink&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=.25&key=false&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode + '\">';
					var labimg = '';
						labimg +='<img src=\"http://ad1.pocketcents.net/lab/images/pcentsLeaderboard.png\" width=\"726\" height=\"90\" />';
						//labimg +='</a>';
					$pCents('#pcentslab').html(labimg);
				} else if(lab.labType == 'mediumRectangle') {
					$pCents('#pcentslab').width(300);
					$pCents('#pcentslab').height(250);
					$pCents('#pcentslab').html('');
					//var labimg = '<a href="http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=661&category=' + lab.category + '&partner=pCents&url=' + escape('http://pocketcents.com/Services/Local-Online-Advertising') + '&action=hyperLink&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=.25&key=false&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode + '\">';
					var labimg = '';
						labimg +='<img src=\"http://ad1.pocketcents.net/lab/images/pcentsMediumRectangle.png\" width=\"300\" height=\"250\" />';
						//labimg +='</a>';
					$pCents('#pcentslab').html(labimg);
				} else if(lab.labType == 'wideSkyscraper') {
					$pCents('#pcentslab').width(160);
					$pCents('#pcentslab').height(600);
					$pCents('#pcentslab').html('');
					//var labimg = '<a href="http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=659&category=' + lab.category + '&partner=pCents&url=' + escape('http://pocketcents.com/Services/Local-Online-Advertising') + '&action=hyperLink&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=.25&key=false&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode + '\">';
					var labimg = '';	
						labimg +='<img src=\"http://ad1.pocketcents.net/lab/images/pcentsWideSkyscraper.png\" width=\"160\" height=\"600\" />';
						//labimg +='</a>';
					$pCents('#pcentslab').html(labimg);
				} else if(lab.labType == 'rectangle') {
					$pCents('#pcentslab').width(180);
					$pCents('#pcentslab').height(150);
					$pCents('#pcentslab').html('');
					//var labimg = '<a href="http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=660&category=' + lab.category + '&partner=pCents&url=' + escape('http://pocketcents.com/Services/Local-Online-Advertising') + '&action=hyperLink&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=.25&key=false&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode + '\">';
					var labimg = '';	
						labimg +='<img src=\"http://ad1.pocketcents.net/lab/images/pcentsRectangle.png\" width=\"180\" height=\"150\" />';
						//labimg +='</a>';
					$pCents('#pcentslab').html(labimg);
				} else if(lab.labType == 'halfPageAd') {
					$pCents('#pcentslab').width(300);
					$pCents('#pcentslab').height(600);
					$pCents('#pcentslab').html('');
					//var labimg = '<a href="http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=663&category=' + lab.category + '&partner=pCents&url=' + escape('http://pocketcents.com/Services/Local-Online-Advertising') + '&action=hyperLink&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=.25&key=false&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode + '\">';
					var labimg = '';	
						labimg +='<img src=\"http://ad1.pocketcents.net/lab/images/pcentsHalfPageAd.png\" width=\"300\" height=\"600\" />';
						//labimg +='</a>';
					$pCents('#pcentslab').html(labimg);
				} else {
					//Error
				}
			}
			
			else {
				var empty = ads.needed - ads.received;
				for(var x=0; x < empty; x++) { 
					var rand = Math.floor(Math.random()*4);
					if( rand == 1 ) {
						var img = '1x1coupons.png';
						var pCentsadID = 991;
					} else if( rand == 2) {
						var img = '1x1mobile.png';
						var pCentsadID = 707;
					} else if( rand == 3) {
						var img = '1x1video.png';
						var pCentsadID = 665;
					} else {
						var img = '1x1web.png';
						var pCentsadID = 664;
					}
					
					var i = Math.floor(Math.random() * 1000);
					$pCents('#pcentslab').append('<div id=\"' + pCentsadID + cycle.cycID + i + '\" style=\"\">');
            			$pCents('#' + pCentsadID + cycle.cycID + i).css('display', 'none');
            			$pCents('#' + pCentsadID + cycle.cycID + i).css('margin', ads.margins);
						$pCents('#' + pCentsadID + cycle.cycID + i).css('cursor', 'pointer');
						$pCents('#' + pCentsadID + cycle.cycID + i).css('background-color', '#FFF');
						$pCents('#' + pCentsadID + cycle.cycID + i).css('border-width', '1px');
						$pCents('#' + pCentsadID + cycle.cycID + i).css('border-style', 'dashed');
						$pCents('#' + pCentsadID + cycle.cycID + i).css('border-color', '#FFF');
						$pCents('#' + pCentsadID + cycle.cycID + i).css('width', '148px');
						$pCents('#' + pCentsadID + cycle.cycID + i).css('height', '78px');
						$pCents('#' + pCentsadID + cycle.cycID + i).css('float', 'left');
							//var html = '<a href="http://pocketcents.com/lab/click.php?id=' + lab.labID + '&go=' + pCentsadID + '&category=' + lab.category + '&partner=pCents&url=' + escape('http://pocketcents.com/Services/Local-Online-Advertising') + '&action=hyperLink&os=' + visitor.system + '&ua=' + visitor.browser + '&bid=.25&key=false&location=' + visitor.locationID + '&latitude=' + visitor.latitude + '&longitude=' + visitor.longitude + '&city=' + visitor.city + '&country=' + visitor.country + '&countryCode=' + visitor.countryCode + '\">';
							var html = '';	
								html+= '<img src=\"http://ad1.pocketcents.net/lab/images/' + img + '\" width=\"148" height=\"78\" />';
								//html += '</a>';
							$pCents('#' + pCentsadID + cycle.cycID + i).append(html);
					$pCents('#pcentslab').append('</div>');
					$pCents('#' + pCentsadID + cycle.cycID + i).fadeIn(2000);
				}
			}
			ads.addEmpty();
		}
	},
	addEmpty: function() {
	if(ads.received < ads.needed) {
		$pCents.getJSON('http://ad1.pocketcents.net/lab/get/empty.class.php?callback=?', {
			cycID: cycle.cycID,
			labID: lab.labID,
			emptySpaces: ads.needed - ads.received,
			userBrowser: visitor.browser,
			userSystem: visitor.system,
			ipAddress: visitor.ipAddress,
			categoryID: lab.categoryID,
			category: lab.category,
			mobile: lab.mobile,
			newWindow: lab.newWindow,
			gender: lab.gender,
			clickRate: lab.clickRate,
			adType: lab.adType,
			url: lab.url,
			locationID: visitor.locationID,
			latitude: visitor.latitude,
			longitude: visitor.longitude,
			city: visitor.city,
			country: visitor.country,
			countryCode: visitor.countryCode,
			gotGPS: visitor.gotGPS
		}, function(data) {
			//Done
		});
	}
	}
}

var lab = {
	labID: labID,
	getInfo: function() {
		$pCents.getJSON('http://ad1.pocketcents.net/lab/pCentsLoader.php?callback=?', {
			cycID: cycle.cycID,
			labID: lab.labID,
			latitude: visitor.latitude,
			longitude: visitor.longitude,
			userBrowser: visitor.browser,
			userSystem: visitor.system,
			url: location.href
		}, function(data) {
			lab.categoryID = data['categoryID'];
			lab.category = data['category'];
			lab.mobile = data['mobile'];
			lab.newWindow = data['newWindow'];
			lab.gender = data['gender'];
			lab.width = data['width'];
			lab.height = data['height'];
			lab.clickRate = data['clickRate'];
			lab.labType = data['labType'];
			lab.adType = data['adType'];
			lab.url = data['url'];
			lab.noAdsCode = data['noAdsCode'];
			visitor.ipAddress = data['ipAddress'];
			visitor.locationID = data['locationID'];
			if( ! visitor.latitude) visitor.latitude = data['latitude'];
			if( ! visitor.longitude) visitor.longitude = data['longitude'];
			visitor.city = data['city'];
			visitor.country = data['country'];
			visitor.countryCode = data['countryCode'];
			cycle.partnerInfo = data['partnerInfo'];
			cycle.cycID++;
			lab.loadBoard();
		});
	},
	loadBoard: function() {
		if(window.adTitleColor === undefined && window.ad_space_title != undefined) {
			search = ad_space_title.search('#');
			if(search == -1) ads.adTitleColor = '#' + ad_space_title; 
			else ads.adTitleColor = ad_space_title;
		} else {
			ads.adTitleColor = '#000000';
		}

		if(window.adTextColor === undefined && window.ad_space_text != undefined) {
			search = ad_space_text.search('#');
			if(search == -1) ads.adTextColor = '#' + ad_space_text; 
			else ads.adTextColor = ad_space_text;
		} else {
			ads.adTextColor = '#000000';
		}

		if(window.adLinkColor === undefined && window.ad_space_link != undefined) {
			search = ad_space_link.search('#');
			if(search == -1) ads.adLinkColor = '#' + ad_space_link;
			else ads.adLinkColor = ad_space_link;
		} else {
			ads.adLinkColor = '#44689D';
		}

		if(window.adBackColor === undefined && window.ad_space_background != undefined) {
			search = ad_space_background.search('#');
			if(search == -1) ads.adBackColor = '#' + ad_space_background;
			else ads.adBackColor = ad_space_background;
		} else {
			ads.adBackColor = '#DDDDDD';
		}
		
		$pCents('#pcentslab').html('');	
		$pCents('#pcentslab').css('background-color', '#121e33');
		$pCents('#pcentslab').css('font-family', 'Arial');
		$pCents('#pcentslab').css('line-height', 'normal');
		$pCents('#pcentslab').css('text-align', 'left');
		
		if(lab.labType == 'leaderboard') {
			ads.needed = 4;
			ads.margins = '5px 0px 0px 5px';
			$pCents('#pcentslab').width(726);
			$pCents('#pcentslab').height(90);
			$pCents('#pcentslab').css('background-image', 'url(http://ad1.pocketcents.net/lab/images/leaderboard.png)');
		} else if(lab.labType == 'mediumRectangle') {
			ads.needed = 6;
			ads.margins = '0px 0px 0px 0px';
			$pCents('#pcentslab').width(300);
			$pCents('#pcentslab').height(250);
			$pCents('#pcentslab').css('background-image', 'url(http://ad1.pocketcents.net/lab/images/mediumRectangle.png)');
			$pCents('#pcentslab').append('<div id=\"fillerSpace\" style=\"width: 300px; height: 10px;\"></div>');
		} else if(lab.labType == 'wideSkyscraper') {
			ads.needed = 6;
			ads.margins = '5px 0px 0px 5px';
			$pCents('#pcentslab').width(160);
			$pCents('#pcentslab').height(600);
			$pCents('#pcentslab').css('background-image', 'url(http://ad1.pocketcents.net/lab/images/wideSkyscraper.png)');
			$pCents('#pcentslab').append('<div id=\"fillerSpace\" style=\"width: 160px; height: 85px;\"></div>');
		} else if(lab.labType == 'rectangle') {
			ads.needed = 1;
			ads.margins = '0px 0px 0px 15px';
			$pCents('#pcentslab').width(180);
			$pCents('#pcentslab').height(150);
			$pCents('#pcentslab').css('background-image', 'url(http://ad1.pocketcents.net/lab/images/rectangle.png)');
			$pCents('#pcentslab').append('<div id=\"fillerSpace\" style=\"width: 180px; height: 55px;\"></div>');
		} else if(lab.labType == 'halfPageAd') {
			ads.needed = 14;
			ads.margins = '0px 0px 0px 0px';
			$pCents('#pcentslab').width(300);
			$pCents('#pcentslab').height(600);
			$pCents('#pcentslab').css('background-image', 'url(http://ad1.pocketcents.net/lab/images/halfPageAd.png)');
			$pCents('#pcentslab').append('<div id=\"fillerSpace\" style=\"width: 300px; height: 40px;\"></div>');
		} else if(lab.labType == 'pCents') {
			ads.needed = (lab.width / 150) * (lab.height / 80);
			ads.margins = '0px 0px 0px 0px';
			$pCents('#pcentslab').width(lab.width);
			$pCents('#pcentslab').height(lab.height);
		} else if(lab.labType == 'mobile') {
			ads.needed = Math.floor((visitor.width / 150));
			var left_margin = (visitor.width - (ads.needed * 150)) / (ads.needed + 1) - 2;
			ads.margins = '5px 0  5px ' + left_margin + 'px';
			$pCents('#pcentslab').width('100%');
			$pCents('#pcentslab').height(103);
			$pCents('#pcentslab').append('<div id=\"fillerSpace\" style=\"width: 100%; height: 13px;\"><img src=\"http://ad1.pocketcents.net/lab/images/mobile.png\" style=\"float:left; margin-top:3px;\" /></div><div style=\"clear:both\"></div>');
			$pCents(window).resize(function() {
  				visitor.checkViewPortSize();
			});
		} else {
			//Error
		}
		ads.getAds();
	}
}

var visitor = {
	getInfo: function() {
		visitor.system = $pCents.client.os;
		visitor.browser = $pCents.client.browser;
		visitor.latitude = false;
		visitor.longitude = false;
		visitor.setViewPortSize();
		if(visitor.system == "iPhone/iPod" || visitor.system == "Android" && visitor.browser != "Cydia") visitor.initiate_geolocation();
		else {
			lab.getInfo();
			visitor.gotGPS = false;
		}
	},
	checkViewPortSize: function() {
		temp_width = visitor.width;
		visitor.setViewPortSize();
		if (visitor.width != temp_width) {
			$pCents('#pcentslab').fadeOut('slow', function() {
				$pCents('#pcentslab').html('');
				ads.received = 0;
				ads.needed = 0;
				cycle.cycID = 1;
				lab.loadBoard(); 
				$pCents('#pcentslab').fadeIn('slow');
			});
		}
	},
	initiate_geolocation: function() {  
		navigator.geolocation.getCurrentPosition(visitor.handle_geolocation_query, visitor.handle_errors, {timeout: 2500});
   	},
   	
   	handle_errors: function(error) {   
		visitor.latitude = false;
		visitor.longitude = false;
		visitor.gotGPS = false;
		lab.getInfo();
    },  
    
    handle_geolocation_query: function(position) {  
    	visitor.latitude = position.coords.latitude; 
        visitor.longitude = position.coords.longitude;
        visitor.gotGPS = true;
        lab.getInfo();
    },
    
    setViewPortSize: function() {
		if (typeof window.innerWidth != 'undefined') {
    		visitor.width = window.innerWidth;
    		visitor.height = window.innerHeight;
		} else if (typeof document.documentElement != 'undefined' && 
				   typeof document.documentElement.clientWidth != 'undefined' && 
				   document.documentElement.clientWidth != 0) {
			visitor.width = document.documentElement.clientWidth;
			visitor.height = document.documentElement.clientHeight;
		} else {
    		visitor.width = document.getElementsByTagName('body')[0].clientWidth;
    		visitor.height = document.getElementsByTagName('body')[0].clientHeight;
		}
	}
}

load = function(url) {
	load.getScript(url);
}

load.getScript = function(filename) {
	var script = document.createElement('script')
	script.setAttribute("type","text/javascript")
	script.setAttribute("src", filename)
	if (typeof script!="undefined")
	document.getElementsByTagName("head")[0].appendChild(script)
}

load.tryReady = function(pcents) {
	if (typeof $ == "undefined" || typeof jQuery == "undefined" || typeof $.client == "undefined") {
		if (pcents <= 5000) {
			if (pcents == 0) load('http://ad1.pocketcents.net/lab/scripts/pcents.js');
			setTimeout("load.tryReady(" + (pcents + 200) + ")", 200);
		} 
	} else {
		$pCents = jQuery.noConflict();
		visitor.getInfo();
	}
}

var headHTML = document.getElementsByTagName('head')[0].innerHTML;
headHTML    += '<link type="text/css" rel="stylesheet" href="http://ad1.pocketcents.net/lab/scripts/jquery.fancybox.css">';
document.getElementsByTagName('head')[0].innerHTML = headHTML;


if(window.clickURL === undefined) var clickURL = '';
load.tryReady(0);