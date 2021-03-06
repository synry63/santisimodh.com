<?

function doCountry($country=FALSE) {
	
	global $errors;
	//print_r($errors);
	
	$sp = $_SESSION['language'];
	
	// English
	if($sp=='en') {
		$paisesValuesForTools = array(
			'AF'=>'Afghanistan',
			'AL'=>'Albania',
			'DZ'=>'Algeria',
			'AS'=>'American Samoa',
			'AD'=>'Andorra',
			'AO'=>'Angola',
			'AI'=>'Anguilla',
			'AQ'=>'Antarctica',
			'AG'=>'Antigua and Barbuda',
			'AR'=>'Argentina',
			'AM'=>'Armenia',
			'AW'=>'Aruba',
			'AU'=>'Australia',
			'AT'=>'Austria',
			'AZ'=>'Azerbaijan',
			'BS'=>'Bahamas',
			'BH'=>'Bahrain',
			'BD'=>'Bangladesh',
			'BB'=>'Barbados',
			'BY'=>'Belarus',
			'BE'=>'Belgium',
			'BZ'=>'Belize',
			'BJ'=>'Benin',
			'BM'=>'Bermuda',
			'BT'=>'Bhutan',
			'BO'=>'Bolivia',
			'BA'=>'Bosnia and Herzegovina',
			'BW'=>'Botswana',
			'BV'=>'Bouvet Island',
			'BR'=>'Brazil',
			'IO'=>'British Indian Ocean Territory',
			'BN'=>'Brunei',
			'BG'=>'Bulgaria',
			'BF'=>'Burkina Faso',
			'BI'=>'Burundi',
			'KH'=>'Cambodia',
			'CM'=>'Cameroon',
			'CA'=>'Canada',
			'CV'=>'Cape Verde',
			'KY'=>'Cayman Islands',
			'CF'=>'Central African Republic',
			'TD'=>'Chad',
			'CL'=>'Chile',
			'CN'=>'China',
			'CX'=>'Christmas Island',
			'CC'=>'Cocos (Keeling) Islands',
			'CO'=>'Colombia',
			'KM'=>'Comoros',
			'CG'=>'Congo',
			'CD'=>'Congo (DRC)',
			'CK'=>'Cook Islands',
			'CR'=>'Costa Rica',
			'CI'=>'Côte dIvoire',
			'HR'=>'Croatia',
			'CU'=>'Cuba',
			'CY'=>'Cyprus',
			'CZ'=>'Czech Republic',
			'DK'=>'Denmark',
			'DJ'=>'Djibouti',
			'DM'=>'Dominica',
			'DO'=>'Dominican Republic',
			'EC'=>'Ecuador',
			'EG'=>'Egypt',
			'SV'=>'El Salvador',
			'GQ'=>'Equatorial Guinea',
			'ER'=>'Eritrea',
			'EE'=>'Estonia',
			'ET'=>'Ethiopia',
			'FK'=>'Falkland Islands (Islas Malvinas)',
			'FO'=>'Faroe Islands',
			'FJ'=>'Fiji Islands',
			'FI'=>'Finland',
			'FR'=>'France',
			'GF'=>'French Guiana',
			'PF'=>'French Polynesia',
			'TF'=>'French Southern and Antarctic Lands',
			'GA'=>'Gabon',
			'GM'=>'Gambia, The',
			'GE'=>'Georgia',
			'DE'=>'Germany',
			'GH'=>'Ghana',
			'GI'=>'Gibraltar',
			'GR'=>'Greece',
			'GL'=>'Greenland',
			'GD'=>'Grenada',
			'GP'=>'Guadeloupe',
			'GU'=>'Guam',
			'GT'=>'Guatemala',
			'GG'=>'Guernsey',
			'GN'=>'Guinea',
			'GW'=>'Guinea-Bissau',
			'GY'=>'Guyana',
			'HT'=>'Haiti',
			'HM'=>'Heard Island and McDonald Islands',
			'HN'=>'Honduras',
			'HK'=>'Hong Kong SAR',
			'HU'=>'Hungary',
			'IS'=>'Iceland',
			'IN'=>'India',
			'ID'=>'Indonesia',
			'IR'=>'Iran',
			'IQ'=>'Iraq',
			'IE'=>'Ireland',
			'IM'=>'Isle of Man',
			'IL'=>'Israel',
			'IT'=>'Italy',
			'JM'=>'Jamaica',
			'JP'=>'Japan',
			'JE'=>'Jersey',
			'JO'=>'Jordan',
			'KZ'=>'Kazakhstan',
			'KE'=>'Kenya',
			'KI'=>'Kiribati',
			'KR'=>'Korea',
			'KW'=>'Kuwait',
			'KG'=>'Kyrgyzstan',
			'LA'=>'Laos',
			'LV'=>'Latvia',
			'LB'=>'Lebanon',
			'LS'=>'Lesotho',
			'LR'=>'Liberia',
			'LY'=>'Libya',
			'LI'=>'Liechtenstein',
			'LT'=>'Lithuania',
			'LU'=>'Luxembourg',
			'MO'=>'Macao SAR',
			'MK'=>'Macedonia, Former Yugoslav Republic of',
			'MG'=>'Madagascar',
			'MW'=>'Malawi',
			'MY'=>'Malaysia',
			'MV'=>'Maldives',
			'ML'=>'Mali',
			'MT'=>'Malta',
			'MH'=>'Marshall Islands',
			'MQ'=>'Martinique',
			'MR'=>'Mauritania',
			'MU'=>'Mauritius',
			'YT'=>'Mayotte',
			'MX'=>'Mexico',
			'FM'=>'Micronesia',
			'MD'=>'Moldova',
			'MC'=>'Monaco',
			'MN'=>'Mongolia',
			'ME'=>'Montenegro',
			'MS'=>'Montserrat',
			'MA'=>'Morocco',
			'MZ'=>'Mozambique',
			'MM'=>'Myanmar',
			'NA'=>'Namibia',
			'NR'=>'Nauru',
			'NP'=>'Nepal',
			'NL'=>'Netherlands',
			'AN'=>'Netherlands Antilles',
			'NC'=>'New Caledonia',
			'NZ'=>'New Zealand',
			'NI'=>'Nicaragua',
			'NE'=>'Niger',
			'NG'=>'Nigeria',
			'NU'=>'Niue',
			'NF'=>'Norfolk Island',
			'KP'=>'North Korea',
			'MP'=>'Northern Mariana Islands',
			'NO'=>'Norway',
			'OM'=>'Oman',
			'PK'=>'Pakistan',
			'PW'=>'Palau',
			'PS'=>'Palestinian Authority',
			'PA'=>'Panama',
			'PG'=>'Papua New Guinea',
			'PY'=>'Paraguay',
			'PE'=>'Peru',
			'PH'=>'Philippines',
			'PN'=>'Pitcairn Islands',
			'PL'=>'Poland',
			'PT'=>'Portugal',
			'PR'=>'Puerto Rico',
			'QA'=>'Qatar',
			'RE'=>'Reunion',
			'RO'=>'Romania',
			'RU'=>'Russia',
			'RW'=>'Rwanda',
			'WS'=>'Samoa',
			'SM'=>'San Marino',
			'ST'=>'São Tomé and Príncipe',
			'SA'=>'Saudi Arabia',
			'SN'=>'Senegal',
			'RS'=>'Serbia',
			'SC'=>'Seychelles',
			'SL'=>'Sierra Leone',
			'SG'=>'Singapore',
			'SK'=>'Slovakia',
			'SI'=>'Slovenia',
			'SB'=>'Solomon Islands',
			'SO'=>'Somalia',
			'ZA'=>'South Africa',
			'GS'=>'South Georgia and the South Sandwich Islands',
			'ES'=>'Spain',
			'LK'=>'Sri Lanka',
			'SH'=>'St. Helena',
			'KN'=>'St. Kitts and Nevis',
			'LC'=>'St. Lucia',
			'PM'=>'St. Pierre and Miquelon',
			'VC'=>'St. Vincent and the Grenadines',
			'SD'=>'Sudan',
			'SR'=>'Suriname',
			'SJ'=>'Svalbard and Jan Mayen',
			'SZ'=>'Swaziland',
			'SE'=>'Sweden',
			'CH'=>'Switzerland',
			'SY'=>'Syria',
			'TW'=>'Taiwan',
			'TJ'=>'Tajikistan',
			'TZ'=>'Tanzania',
			'TH'=>'Thailand',
			'TP'=>'Timor-Leste (East Timor)',
			'TG'=>'Togo',
			'TK'=>'Tokelau',
			'TO'=>'Tonga',
			'TT'=>'Trinidad and Tobago',
			'TN'=>'Tunisia',
			'TR'=>'Turkey',
			'TM'=>'Turkmenistan',
			'TC'=>'Turks and Caicos Islands',
			'TV'=>'Tuvalu',
			'UG'=>'Uganda',
			'UA'=>'Ukraine',
			'AE'=>'United Arab Emirates',
			'UK'=>'United Kingdom',
			'US'=>'United States',
			'UM'=>'United States Minor Outlying Islands',
			'UY'=>'Uruguay',
			'UZ'=>'Uzbekistan',
			'VU'=>'Vanuatu',
			'VA'=>'Vatican City',
			'VE'=>'Venezuela',
			'VN'=>'Vietnam',
			'VG'=>'Virgin Islands, British',
			'VI'=>'Virgin Islands, U.S.',
			'WF'=>'Wallis and Futuna',
			'YE'=>'Yemen',
			'ZM'=>'Zambia',
			'ZW'=>'Zimbabwe');
	}
	
	// Spanish
	if($sp=='es') {
		$paisesValuesForTools = array(
			'AF'=>'Afganistán',
			'AL'=>'Albania',
			'DE'=>'Alemania',
			'AD'=>'Andorra',
			'AO'=>'Angola',
			'AI'=>'Anguila',
			'AQ'=>'Antártida',
			'AG'=>'Antigua y Barbuda',
			'AN'=>'Antillas holandesas',
			'SA'=>'Arabia Saudí',
			'DZ'=>'Argelia',
			'AR'=>'Argentina',
			'AM'=>'Armenia',
			'AW'=>'Aruba',
			'AU'=>'Australia',
			'AT'=>'Austria',
			'PS'=>'Autoridad Palestina',
			'AZ'=>'Azerbaiyán',
			'BH'=>'Bahrein',
			'BD'=>'Bangladesh',
			'BB'=>'Barbados',
			'BE'=>'Bélgica',
			'BZ'=>'Belice',
			'BJ'=>'Benín',
			'BM'=>'Bermudas',
			'BT'=>'Bhután',
			'BY'=>'Bielorrusia',
			'MM'=>'Birmania',
			'BO'=>'Bolivia',
			'BA'=>'Bosnia y Herzegovina',
			'BW'=>'Botsuana',
			'BR'=>'Brasil',
			'BN'=>'Brunéi',
			'BG'=>'Bulgaria',
			'BF'=>'Burkina Faso',
			'BI'=>'Burundi',
			'CV'=>'Cabo Verde',
			'KH'=>'Camboya',
			'CM'=>'Camerún',
			'CA'=>'Canadá',
			'TD'=>'Chad',
			'CL'=>'Chile',
			'CN'=>'China',
			'CY'=>'Chipre',
			'VA'=>'Ciudad del Vaticano',
			'CO'=>'Colombia',
			'KM'=>'Comores',
			'CG'=>'Congo',
			'CD'=>'Congo (RDC)',
			'KR'=>'Corea',
			'KP'=>'Corea del Norte',
			'CI'=>'Costa del Marfíl',
			'CR'=>'Costa Rica',
			'HR'=>'Croacia (Hrvatska)',
			'CU'=>'Cuba',
			'DK'=>'Dinamarca',
			'DJ'=>'Djibouri',
			'DM'=>'Dominica',
			'EC'=>'Ecuador',
			'EG'=>'Egipto',
			'SV'=>'El Salvador',
			'AE'=>'Emiratos Árabes Unidos',
			'ER'=>'Eritrea',
			'SK'=>'Eslovaquia',
			'SI'=>'Eslovenia',
			'ES'=>'España',
			'US'=>'Estados Unidos',
			'EE'=>'Estonia',
			'ET'=>'Etiopía',
			'MK'=>'Ex-República Yugoslava de Macedonia',
			'PH'=>'Filipinas',
			'FI'=>'Finlandia',
			'FR'=>'Francia',
			'GA'=>'Gabón',
			'GM'=>'Gambia',
			'GE'=>'Georgia',
			'GH'=>'Ghana',
			'GI'=>'Gibraltar',
			'GD'=>'Granada',
			'GR'=>'Grecia',
			'GL'=>'Groenlandia',
			'GP'=>'Guadalupe',
			'GU'=>'Guam',
			'GT'=>'Guatemala',
			'GY'=>'Guayana',
			'GF'=>'Guayana Francesa',
			'GG'=>'Guernsey',
			'GN'=>'Guinea',
			'GQ'=>'Guinea Ecuatorial',
			'GW'=>'Guinea-Bissau',
			'HT'=>'Haití',
			'HN'=>'Honduras',
			'HK'=>'Hong Kong, ZAE',
			'HU'=>'Hungría',
			'IN'=>'India',
			'ID'=>'Indonesia',
			'IQ'=>'Irak',
			'IR'=>'Irán',
			'IE'=>'Irlanda',
			'BV'=>'Isla Bouvet',
			'CX'=>'Isla Christmas',
			'IM'=>'Isla de Man',
			'NF'=>'Isla Norfolk',
			'IS'=>'Islandia',
			'KY'=>'Islas Caimán',
			'CC'=>'Islas Cocos',
			'CK'=>'Islas Cook',
			'FO'=>'Islas Feroe',
			'FJ'=>'Islas Fiji',
			'GS'=>'Islas Georgias del Sur y Sandwich del Sur',
			'HM'=>'Islas Heard y McDonald',
			'FK'=>'Islas Malvinas (Falkland Islands)',
			'MP'=>'Islas Marianas del Norte',
			'MH'=>'Islas Marshall',
			'UM'=>'Islas periféricas menores de los Estados Unidos',
			'PN'=>'Islas Pitcairn',
			'SB'=>'Islas Salomón',
			'SJ'=>'Islas Svalbard y Jan Mayen',
			'TC'=>'Islas Turks y Caicos',
			'VG'=>'Islas Vírgenes Británicas',
			'VI'=>'Islas Vírgenes, EE.UU.',
			'WF'=>'Islas Wallis y Futuna',
			'IL'=>'Israel',
			'IT'=>'Italia',
			'JM'=>'Jamaica',
			'JP'=>'Japón',
			'JE'=>'Jersey',
			'JO'=>'Jordania',
			'KZ'=>'Kazajstán',
			'KE'=>'Kenia',
			'KG'=>'Kirguizistán',
			'KI'=>'Kiribati',
			'KW'=>'Kuwait',
			'LA'=>'Laos',
			'BS'=>'Las Bahamas',
			'LS'=>'Lesoto',
			'LV'=>'Letonia',
			'LB'=>'Líbano',
			'LR'=>'Liberia',
			'LY'=>'Libia',
			'LI'=>'Liechtenstein',
			'LT'=>'Lituania',
			'LU'=>'Luxemburgo',
			'MO'=>'Macao, ZAE',
			'MG'=>'Madagascar',
			'MY'=>'Malaisia',
			'MW'=>'Malawi',
			'MV'=>'Maldivas',
			'ML'=>'Malí',
			'MT'=>'Malta',
			'MA'=>'Marruecos',
			'MQ'=>'Martinica',
			'MU'=>'Mauricio',
			'MR'=>'Mauritania',
			'YT'=>'Mayotte',
			'MX'=>'México',
			'FM'=>'Micronesia',
			'MD'=>'Moldavia',
			'MC'=>'Mónaco',
			'MN'=>'Mongolia',
			'ME'=>'Montenegro',
			'MS'=>'Montserrat',
			'MZ'=>'Mozambique',
			'NA'=>'Namibia',
			'NR'=>'Nauru',
			'NP'=>'Nepal',
			'NI'=>'Nicaragua',
			'NE'=>'Níger',
			'NG'=>'Nigeria',
			'NU'=>'Niue',
			'NO'=>'Noruega',
			'NC'=>'Nueva Caledonia',
			'NZ'=>'Nueva Zelanda',
			'OM'=>'Omán',
			'NL'=>'Países Bajos',
			'PK'=>'Pakistán',
			'PW'=>'Palaos',
			'PA'=>'Panamá',
			'PG'=>'Papúa-Nueva Guinea',
			'PY'=>'Paraguay',
			'PE'=>'Perú',
			'PF'=>'Polinesia Francesa',
			'PL'=>'Polonia',
			'PT'=>'Portugal',
			'PR'=>'Puerto Rico',
			'QA'=>'Qatar',
			'UK'=>'Reino Unido',
			'CF'=>'República Centroafricana',
			'CZ'=>'República Checa',
			'ZA'=>'República de Sudáfrica',
			'DO'=>'República Dominicana',
			'RE'=>'Reunión',
			'RW'=>'Ruanda',
			'RO'=>'Rumanía',
			'RU'=>'Rusia',
			'KN'=>'Saint Kitts y Nevis',
			'WS'=>'Samoa',
			'AS'=>'Samoa Americana',
			'SM'=>'San Marino',
			'PM'=>'San Pedro y Miquelón',
			'VC'=>'San Vicente y las Granadinas',
			'SH'=>'Santa Elena',
			'LC'=>'Santa Lucía',
			'ST'=>'Santo Tomé y Príncipe',
			'SN'=>'Senegal',
			'RS'=>'Serbia',
			'SC'=>'Seychelles',
			'SL'=>'Sierra Leona',
			'SG'=>'Singapur',
			'SY'=>'Siria',
			'SO'=>'Somalia',
			'LK'=>'Sri Lanka',
			'SZ'=>'Suazilandia',
			'SD'=>'Sudán',
			'SE'=>'Suecia',
			'CH'=>'Suiza',
			'SR'=>'Surinam',
			'TH'=>'Tailandia',
			'TW'=>'Taiwán',
			'TZ'=>'Tanzania',
			'TJ'=>'Tayikistán',
			'IO'=>'Territorio Británico del Océano Índico',
			'TF'=>'Tierras Australes y Antárticas Francesas',
			'TP'=>'Timor Oriental',
			'TG'=>'Togo',
			'TK'=>'Tokelau',
			'TO'=>'Tonga',
			'TT'=>'Trinidad y Tobago',
			'TN'=>'Túnez',
			'TM'=>'Turkmenistán',
			'TR'=>'Turquía',
			'TV'=>'Tuvalu',
			'UA'=>'Ucrania',
			'UG'=>'Uganda',
			'UY'=>'Uruguay',
			'UZ'=>'Uzbekistán',
			'VU'=>'Vanuatu',
			'VE'=>'Venezuela',
			'VN'=>'Vietnam',
			'YE'=>'Yemen',
			'ZM'=>'Zambia',
			'ZW'=>'Zimbabue');
	}
	
	// German
	if($sp=='de') {
		$paisesValuesForTools = array(
			'AF'=>'Afghanistan',
			'EG'=>'Ägypten',
			'AL'=>'Albanien',
			'DZ'=>'Algerien',
			'AS'=>'Amerikanisch-Samoa',
			'AD'=>'Andorra',
			'AO'=>'Angola',
			'AI'=>'Anguilla',
			'AQ'=>'Antarktis',
			'AG'=>'Antigua und Barbuda',
			'GQ'=>'Äquatorialguinea',
			'AR'=>'Argentinien',
			'AM'=>'Armenien',
			'AW'=>'Aruba',
			'AZ'=>'Aserbaidschan',
			'ET'=>'Äthiopien',
			'AU'=>'Australien',
			'BS'=>'Bahamas',
			'BH'=>'Bahrain',
			'BD'=>'Bangladesch',
			'BB'=>'Barbados',
			'BE'=>'Belgien',
			'BZ'=>'Belize',
			'BJ'=>'Benin',
			'BM'=>'Bermuda',
			'BT'=>'Bhutan',
			'BO'=>'Bolivien',
			'BA'=>'Bosnien und Herzegowina',
			'BW'=>'Botsuana',
			'BV'=>'Bouvet-Insel',
			'BR'=>'Brasilien',
			'IO'=>'Britisches Territorium im Indischen Ozean',
			'BN'=>'Brunei Darussalam',
			'BG'=>'Bulgarien',
			'BF'=>'Burkina Faso',
			'BI'=>'Burundi',
			'KY'=>'Cayman-Inseln',
			'CL'=>'Chile',
			'CN'=>'China',
			'CK'=>'Cookinseln',
			'CR'=>'Costa Rica',
			'CI'=>'Côte dIvoire',
			'DK'=>'Dänemark',
			'DE'=>'Deutschland',
			'DM'=>'Dominica',
			'DO'=>'Dominikanische Republik',
			'DJ'=>'Dschibuti',
			'EC'=>'Ecuador',
			'SV'=>'El Salvador',
			'ER'=>'Eritrea',
			'EE'=>'Estland',
			'FK'=>'Falklandinseln',
			'FO'=>'Färöer Inseln',
			'FJ'=>'Fidschi-Inseln',
			'FI'=>'Finnland',
			'FR'=>'Frankreich',
			'TF'=>'Französische Südpolar-Territorien',
			'GF'=>'Französisch-Guyana',
			'PF'=>'Französisch-Polynesien',
			'GA'=>'Gabun',
			'GM'=>'Gambia',
			'GE'=>'Georgien',
			'GH'=>'Ghana',
			'GI'=>'Gibraltar',
			'GD'=>'Grenada',
			'GR'=>'Griechenland',
			'GL'=>'Grönland',
			'UK'=>'Großbritannien',
			'GP'=>'Guadeloupe',
			'GU'=>'Guam',
			'GT'=>'Guatemala',
			'GG'=>'Guernsey',
			'GN'=>'Guinea',
			'GW'=>'Guinea-Bissau',
			'GY'=>'Guyana',
			'HT'=>'Haiti',
			'HM'=>'Heard- und McDonald-Inseln',
			'HN'=>'Honduras',
			'IN'=>'Indien',
			'ID'=>'Indonesien',
			'IQ'=>'Irak',
			'IR'=>'Iran',
			'IE'=>'Irland',
			'IS'=>'Island',
			'IM'=>'Isle of Man',
			'IL'=>'Israel',
			'IT'=>'Italien',
			'JM'=>'Jamaika',
			'JP'=>'Japan',
			'YE'=>'Jemen',
			'JE'=>'Jersey',
			'JO'=>'Jordanien',
			'VG'=>'Jungferninseln (Britisch)',
			'VI'=>'Jungferninseln U.S.',
			'KH'=>'Kambodscha',
			'CM'=>'Kamerun',
			'CA'=>'Kanada',
			'CV'=>'Kap Verde',
			'KZ'=>'Kasachstan',
			'QA'=>'Katar',
			'KE'=>'Kenia',
			'KG'=>'Kirgistan',
			'KI'=>'Kiribati',
			'CC'=>'Kokosinseln',
			'CO'=>'Kolumbien',
			'KM'=>'Komoren',
			'CG'=>'Kongo',
			'CD'=>'Kongo, Demokratische Republik',
			'KR'=>'Korea',
			'HR'=>'Kroatien',
			'CU'=>'Kuba',
			'KW'=>'Kuwait',
			'LA'=>'Laos',
			'LS'=>'Lesotho',
			'LV'=>'Lettland',
			'LB'=>'Libanon',
			'LR'=>'Liberia',
			'LY'=>'Libyen',
			'LI'=>'Liechtenstein',
			'LT'=>'Litauen',
			'LU'=>'Luxemburg',
			'MG'=>'Madagaskar',
			'MW'=>'Malawi',
			'MY'=>'Malaysia',
			'MV'=>'Malediven',
			'ML'=>'Mali',
			'MT'=>'Malta',
			'MA'=>'Marokko',
			'MH'=>'Marshall-Inseln',
			'MQ'=>'Martinique',
			'MR'=>'Mauretanien',
			'MU'=>'Mauritius',
			'YT'=>'Mayotte',
			'MK'=>'Mazedonien, ehemalige jugoslawische Republik',
			'MX'=>'Mexiko',
			'FM'=>'Mikronesien',
			'MD'=>'Moldawien',
			'MC'=>'Monaco',
			'MN'=>'Mongolei',
			'ME'=>'Montenegro',
			'MS'=>'Montserrat',
			'MZ'=>'Mosambik',
			'MM'=>'Myanmar',
			'NA'=>'Namibia',
			'NR'=>'Nauru',
			'NP'=>'Nepal',
			'NC'=>'Neukaledonien',
			'NZ'=>'Neuseeland',
			'NI'=>'Nicaragua',
			'NL'=>'Niederlande',
			'AN'=>'Niederländisch-Antillen',
			'NE'=>'Niger',
			'NG'=>'Nigeria',
			'NU'=>'Niue',
			'KP'=>'Nordkorea',
			'MP'=>'Nördliche Marianen',
			'NF'=>'Norfolk-Insel',
			'NO'=>'Norwegen',
			'OM'=>'Oman',
			'AT'=>'Österreich',
			'PK'=>'Pakistan',
			'PS'=>'Palästina',
			'PW'=>'Palau',
			'PA'=>'Panama',
			'PG'=>'Papua-Neuguinea',
			'PY'=>'Paraguay',
			'PE'=>'Peru',
			'PH'=>'Philippinen',
			'PN'=>'Pitcairninseln',
			'PL'=>'Polen',
			'PT'=>'Portugal',
			'PR'=>'Puerto Rico',
			'BY'=>'Republik Belarus',
			'RE'=>'Réunion',
			'RW'=>'Ruanda',
			'RO'=>'Rumänien',
			'RU'=>'Russische Föderation',
			'SH'=>'Saint Helena',
			'KN'=>'Saint Kitts und Nevis',
			'LC'=>'Saint Lucia',
			'VC'=>'Saint Vincent und die Grenadinen',
			'PM'=>'Saint-Pierre-et-Miquelon',
			'ZM'=>'Sambia',
			'WS'=>'Samoa',
			'SM'=>'San Marino',
			'ST'=>'São Tomé und Príncipe',
			'SA'=>'Saudi-Arabien',
			'SE'=>'Schweden',
			'CH'=>'Schweiz',
			'SN'=>'Senegal',
			'RS'=>'Serbien',
			'SC'=>'Seychellen',
			'SL'=>'Sierra Leone',
			'ZW'=>'Simbabwe',
			'SG'=>'Singapur',
			'SK'=>'Slowakei',
			'SI'=>'Slowenien',
			'SB'=>'Solomonen',
			'SO'=>'Somalia',
			'HK'=>'Sonderverwaltungsregion Hongkong',
			'MO'=>'Sonderverwaltungsregion Macao',
			'ES'=>'Spanien',
			'LK'=>'Sri Lanka',
			'ZA'=>'Südafrika',
			'SD'=>'Sudan',
			'GS'=>'Südgeorgien und die Südlichen Sandwichinseln',
			'SR'=>'Surinam',
			'SJ'=>'Svalbard und Jan Mayen',
			'SZ'=>'Swasiland',
			'SY'=>'Syrien',
			'TJ'=>'Tadschikistan',
			'TW'=>'Taiwan',
			'TZ'=>'Tansania',
			'TH'=>'Thailand',
			'TP'=>'Timor-Leste (Osttimor)',
			'TG'=>'Togo',
			'TK'=>'Tokelau',
			'TO'=>'Tonga',
			'TT'=>'Trinidad und Tobago',
			'TD'=>'Tschad',
			'CZ'=>'Tschechische Republik',
			'TN'=>'Tunesien',
			'TR'=>'Türkei',
			'TM'=>'Turkmenistan',
			'TC'=>'Turks- und Caicosinseln',
			'TV'=>'Tuwalu',
			'UG'=>'Uganda',
			'UA'=>'Ukraine',
			'HU'=>'Ungarn',
			'UY'=>'Uruguay',
			'UZ'=>'Usbekistan',
			'VU'=>'Vanuatu',
			'VA'=>'Vatikanstadt',
			'VE'=>'Venezuela',
			'AE'=>'Vereinigte Arabische Emirate',
			'US'=>'Vereinigte Staaten von Amerika',
			'UM'=>'Vereinigte Staaten von Amerika - vorgelagerte Inseln',
			'VN'=>'Vietnam',
			'WF'=>'Wallis und Futuna',
			'CX'=>'Weihnachtsinseln',
			'CF'=>'Zentralafrikanische Republik',
			'CY'=>'Zypern');
	}
	
	// Polish
	if($sp=='pl') {
		$paisesValuesForTools = array(
			'AF'=>'Afganistan',
			'AL'=>'Albania',
			'DZ'=>'Algieria',
			'AD'=>'Andora',
			'AO'=>'Angola',
			'AI'=>'Anguilla',
			'AQ'=>'Antarktyda',
			'AG'=>'Antigua i Barbuda',
			'SA'=>'Arabia Saudyjska',
			'AR'=>'Argentyna',
			'AM'=>'Armenia',
			'AW'=>'Aruba',
			'AU'=>'Australia',
			'AT'=>'Austria',
			'AZ'=>'Azerbejdżan',
			'BS'=>'Bahamy',
			'BH'=>'Bahrajn',
			'BD'=>'Bangladesz',
			'BB'=>'Barbados',
			'BE'=>'Belgia',
			'BZ'=>'Belize',
			'BJ'=>'Benin',
			'BM'=>'Bermudy',
			'BT'=>'Bhutan',
			'BY'=>'Białoruś',
			'BO'=>'Boliwia',
			'BQ'=>'Bonaire',
			'BA'=>'Bośnia i Hercegowina',
			'BW'=>'Botswana',
			'BR'=>'Brazylia',
			'BN'=>'Brunei',
			'IO'=>'Brytyjskie Terytorium Oceanu Indyjskiego',
			'BG'=>'Bułgaria',
			'BF'=>'Burkina Faso',
			'BI'=>'Burundi',
			'MK'=>'Była Jugosłowiańska Republika Macedonii',
			'CL'=>'Chile',
			'CN'=>'Chiny',
			'HR'=>'Chorwacja',
			'CW'=>'Curaçao',
			'CY'=>'Cypr',
			'TD'=>'Czad',
			'ME'=>'Czarnogóra',
			'DK'=>'Dania',
			'DM'=>'Dominika',
			'DO'=>'Dominikana',
			'DJ'=>'Dżibuti',
			'EG'=>'Egipt',
			'EC'=>'Ekwador',
			'ER'=>'Erytrea',
			'EE'=>'Estonia',
			'ET'=>'Etiopia',
			'FK'=>'Falklandy (Malwiny)',
			'FJ'=>'Fidżi',
			'PH'=>'Filipiny',
			'FI'=>'Finlandia',
			'FR'=>'Francja',
			'TF'=>'Francuskie Terytoria Południowe i Antarktyczne',
			'GA'=>'Gabon',
			'GM'=>'Gambia',
			'GH'=>'Ghana',
			'GI'=>'Gibraltar',
			'GR'=>'Grecja',
			'GD'=>'Grenada',
			'GL'=>'Grenlandia',
			'GE'=>'Gruzja',
			'GU'=>'Guam',
			'GG'=>'Guernsey',
			'GY'=>'Gujana',
			'GF'=>'Gujana Francuska',
			'GP'=>'Gwadelupa',
			'GT'=>'Gwatemala',
			'GN'=>'Gwinea',
			'GW'=>'Gwinea Bissau',
			'GQ'=>'Gwinea Równikowa',
			'HT'=>'Haiti',
			'ES'=>'Hiszpania',
			'NL'=>'Holandia',
			'HN'=>'Honduras',
			'IN'=>'Indie',
			'ID'=>'Indonezja',
			'IQ'=>'Irak',
			'IR'=>'Iran',
			'IE'=>'Irlandia',
			'IS'=>'Islandia',
			'IL'=>'Izrael',
			'JM'=>'Jamajka',
			'SJ'=>'Jan Mayen',
			'JP'=>'Japonia',
			'YE'=>'Jemen',
			'JE'=>'Jersey',
			'JO'=>'Jordania',
			'KY'=>'Kajmany',
			'KH'=>'Kambodża',
			'CM'=>'Kamerun',
			'CA'=>'Kanada',
			'QA'=>'Katar',
			'KZ'=>'Kazachstan',
			'KE'=>'Kenia',
			'KG'=>'Kirgistan',
			'KI'=>'Kiribati',
			'CO'=>'Kolumbia',
			'KM'=>'Komory',
			'CG'=>'Kongo',
			'CD'=>'Kongo (Demokratyczna Republika Konga)',
			'KR'=>'Korea',
			'KP'=>'Korea Północna',
			'CR'=>'Kostaryka',
			'CU'=>'Kuba',
			'KW'=>'Kuwejt',
			'LA'=>'Laos',
			'LS'=>'Lesotho',
			'LB'=>'Liban',
			'LR'=>'Liberia',
			'LY'=>'Libia',
			'LI'=>'Liechtenstein',
			'LT'=>'Litwa',
			'LU'=>'Luksemburg',
			'LV'=>'Łotwa',
			'MG'=>'Madagaskar',
			'YT'=>'Majotta',
			'MW'=>'Malawi',
			'MV'=>'Malediwy',
			'MY'=>'Malezja',
			'ML'=>'Mali',
			'MT'=>'Malta',
			'MP'=>'Mariany Północne',
			'MA'=>'Maroko',
			'MQ'=>'Martynika',
			'MR'=>'Mauretania',
			'MU'=>'Mauritius',
			'MX'=>'Meksyk',
			'FM'=>'Mikronezja',
			'MC'=>'Monako',
			'MN'=>'Mongolia',
			'MS'=>'Montserrat',
			'MZ'=>'Mozambik',
			'MM'=>'Myanmar',
			'NA'=>'Namibia',
			'NR'=>'Nauru',
			'NP'=>'Nepal',
			'DE'=>'Niemcy',
			'NE'=>'Niger',
			'NG'=>'Nigeria',
			'NI'=>'Nikaragua',
			'NU'=>'Niue',
			'NO'=>'Norwegia',
			'NC'=>'Nowa Kaledonia',
			'NZ'=>'Nowa Zelandia',
			'OM'=>'Oman',
			'PK'=>'Pakistan',
			'PW'=>'Palau',
			'PS'=>'Palestyna',
			'PA'=>'Panama',
			'VA'=>'Państwo Watykańskie',
			'PG'=>'Papua-Nowa Gwinea',
			'PY'=>'Paragwaj',
			'PE'=>'Peru',
			'PF'=>'Polinezja Francuska',
			'PL'=>'Polska',
			'PR'=>'Portoryko',
			'PT'=>'Portugalia',
			'CZ'=>'Republika Czeska',
			'MD'=>'Republika Mołdowy',
			'ZA'=>'Republika Południowej Afryki',
			'CF'=>'Republika Środkowoafrykańska',
			'CV'=>'Republika Zielonego Przylądka',
			'RE'=>'Reunion',
			'RU'=>'Rosja',
			'RO'=>'Rumunia',
			'RW'=>'Rwanda',
			'XS'=>'Saba',
			'KN'=>'Saint Kitts i Nevis',
			'LC'=>'Saint Lucia',
			'VC'=>'Saint Vincent i Grenadyny',
			'BL'=>'Saint-Barthélemy',
			'PM'=>'Saint-Pierre i Miquelon',
			'SV'=>'Salwador',
			'WS'=>'Samoa',
			'AS'=>'Samoa Amerykańskie',
			'SM'=>'San Marino',
			'MF'=>'San Martin',
			'SN'=>'Senegal',
			'RS'=>'Serbia',
			'SC'=>'Seszele',
			'SL'=>'Sierra Leone',
			'SG'=>'Singapur',
			'XE'=>'Sint Eustatius',
			'SX'=>'Sint Maarten',
			'SK'=>'Słowacja',
			'SI'=>'Słowenia',
			'SO'=>'Somalia',
			'HK'=>'Specjalny Region Administracyjny Hongkong',
			'MO'=>'Specjalny Region Administracyjny Makau',
			'LK'=>'Sri Lanka',
			'US'=>'Stany Zjednoczone',
			'UM'=>'Stany Zjednoczone - wyspy zewnętrzne',
			'SZ'=>'Suazi',
			'SD'=>'Sudan',
			'SR'=>'Surinam',
			'SY'=>'Syria',
			'CH'=>'Szwajcaria',
			'SE'=>'Szwecja',
			'SH'=>'Święta Helena',
			'TJ'=>'Tadżykistan',
			'TH'=>'Tajlandia',
			'TW'=>'Tajwan',
			'TZ'=>'Tanzania',
			'TL'=>'Timor Wschodni',
			'TG'=>'Togo',
			'TK'=>'Tokelau',
			'TO'=>'Tonga',
			'TT'=>'Trynidad i Tobago',
			'TN'=>'Tunezja',
			'TR'=>'Turcja',
			'TM'=>'Turkmenistan',
			'TV'=>'Tuvalu',
			'UG'=>'Uganda',
			'UA'=>'Ukraina',
			'UY'=>'Urugwaj',
			'UZ'=>'Uzbekistan',
			'VU'=>'Vanuatu',
			'WF'=>'Wallis i Futuna',
			'VE'=>'Wenezuela',
			'HU'=>'Węgry',
			'UK'=>'Wielka Brytania',
			'VN'=>'Wietnam',
			'IT'=>'Włochy',
			'CI'=>'Wybrzeże Kości Słoniowej',
			'BV'=>'Wyspa Bouveta',
			'CX'=>'Wyspa Bożego Narodzenia',
			'IM'=>'Wyspa Man',
			'NF'=>'Wyspa Norfolk',
			'AX'=>'Wyspy Alandzkie',
			'CK'=>'Wyspy Cooka',
			'VG'=>'Wyspy Dziewicze, Brytyjskie',
			'VI'=>'Wyspy Dziewicze, Stany Zjednoczone',
			'GS'=>'Wyspy Georgia Południowa i Sandwich Południowy',
			'HM'=>'Wyspy Heard i McDonalda',
			'CC'=>'Wyspy Kokosowe (Keelinga)',
			'MH'=>'Wyspy Marshalla',
			'FO'=>'Wyspy Owcze',
			'PN'=>'Wyspy Pitcairn',
			'SB'=>'Wyspy Salomona',
			'ST'=>'Wyspy Świętego Tomasza i Książęca',
			'TC'=>'Wyspy Turks i Caicos',
			'ZM'=>'Zambia',
			'ZW'=>'Zimbabwe',
			'AE'=>'Zjednoczone Emiraty Arabskie'
		);
	}
	
	if($country=='array') {
			return $paisesValuesForTools;
	} else {
		$paisesValuesForTools = $paisesValuesForTools[$country];
		return strtr($paisesValuesForTools,$errors);
	}
}

function doCity($city='array'){
	
	global $errors;
	//print_r($errors);
	
	$sp = $_SESSION['language'];
	
	if($sp=='de') {
		$citiesValuesForTools = array(
			// GERMANY
			'BER'=>'Berlin',
			'BRE'=>'Bremen',
			'DTM'=>'Dortmund',
			'DRS'=>'Dresden',
			'DUS'=>'Düsseldorf',
			'ERF'=>'Erfurt',
			'FRA'=>'Frankfurt am Main',
			'FFO'=>'Frankfurt an der Oder',
			'FDH'=>'Friedrichshafen',
			'HAM'=>'Hamburg',
			'HAJ'=>'Hannover',
			'FKB'=>'Karlsruhe/Baden-Baden',
			'KLN'=>'Köln',
			'BNN'=>'Bonn',
			'LEJ'=>'Leipzig/Halle',
			'MUC'=>'München',
			'FMO'=>'Münster/Osnabrück',
			'NRW'=>'Nordrhein-Westfalen',
			'NUE'=>'Nürnberg',
			'PAD'=>'Paderborn/Lippstadt',
			'POS'=>'Potsdam',
			'RLG'=>'Rostock - Laage',
			'SCN'=>'Saarbrücken',
			'STR'=>'Stuttgart',
			'GWT'=>'Sylt',
			'HDF'=>'Usedom',
			'NRN'=>'Weeze',
			
			
			//Ägypten
			'HRG'=>'Hurghada',
			'CAI'=>'Kairo',
			'LXR'=>'Luxor',
			'RMF'=>'Marsa Alam',
			'SSH'=>'Sharm el Sheik',
			
			
			//Algerien
			'ALG'=>'Algier',
			
			//Bulgarien
			'SOF'=>'Sofia',
			
			//China
			'PEK'=>'Peking',
			
			//Chile
			'SCL'=>'Santiago de Chile',
			
			//Dänemark
			'RNN'=>'Bornholm',
			'CPH'=>'Kopenhagen',
			
			//Dominikanische Republik
			'POP'=>'Puerto Plata',
			'PUJ'=>'Punta Cana',
			
			//Finnland
			'HEL'=>'Helsinki',
			
			
			//Frankreich
			'CLY'=>'Calvi',
			'NCE'=>'Nizza',
			'PAR'=>'Paris',
			'CDG'=>'Paris - Charles de Gaulle',
			'ORY'=>'Paris - Orly',
			
			
			//Griechenland
			'CHQ'=>'Chania',
			'HER'=>'Heraklion',
			'KLX'=>'Kalamata',
			'AOK'=>'Karpathos',
			'KVA'=>'Kavala',
			'CFU'=>'Korfu',
			'KGS'=>'Kos',
			'JMK'=>'Mykonos',
			'MJT'=>'Mytilene (Lesbos)',
			'PVK'=>'Preveza',
			'RHO'=>'Rhodos',
			'SMI'=>'Samos',
			'JTR'=>'Santorini',
			'JSI'=>'Skiathos',
			'SKG'=>'Thessaloniki',
			'VOL'=>'Volos',
			'ZTH'=>'Zakynthos',
			
			
			//Großbritannien
			'GCI'=>'Guernsey',
			'JER'=>'Jersey',
			'LON'=>'London',
			'LGW'=>'London - Gatwick',
			'STN'=>'London - Stansted',
			'MAN'=>'Manchester',
			
			//Irak
			'EBL'=>'Arbil',
			
			//Island
			'KEF'=>'Reykjavik',
			
			//Israel
			'TLV'=>'Tel Aviv',
			
			
			//Italien
			'BRI'=>'Bari',
			'BDS'=>'Brindisi',
			'CAG'=>'Cagliari',
			'CTA'=>'Catania',
			'FLR'=>'Florenz',
			'SUF'=>'Lamezia Terme',
			'MIL'=>'Mailand',
			'MXP'=>'Mailand - Malpensa',
			'NAP'=>'Neapel',
			'OLB'=>'Olbia',
			'PMO'=>'Palermo',
			'RMI'=>'Rimini',
			'FCO'=>'Rom - Fiumicino',
			'VCE'=>'Venedig',
			'VRN'=>'Verona',
			
			//Jamaika
			'MBJ'=>'Montego Bay',
			
			
			//Kambodscha
			'PNH'=>'Phnom Penh',
			
			//Kanada
			'YVR'=>'Vancouver',
			
			//Kenia
			'MBA'=>'Mombasa',
			
			//Kosovo
			'PRN'=>'Pristina',
			
			//Kroatien
			'DBV'=>'Dubrovnik',
			'RJK'=>'Rijeka',
			'SPU'=>'Split',
			
			//Kuba
			'VRA'=>'Varadero',
			
			
			//Malediven
			'MLE'=>'Male',
			
			//Malta
			'MLA'=>'Malta',
			
			//Marokko
			'AGA'=>'Agadir',
			'CMN'=>'Casablanca',
			'NDR'=>'Nador',
			'TNG'=>'Tanger',
			
			//Mexiko
			'CUN'=>'Cancun',
			
			//Montenegro
			'TIV'=>'Tivat',
			
			//Namibia
			'WDH'=>'Windhoek',
			
			//Niederlande
			'AMS'=>'Amsterdam',
			
			//Norwegen
			'OSL'=>'Oslo',
			
			//Österreich
			'GRZ'=>'Graz',
			'INN'=>'Innsbruck',
			'KLU'=>'Kärnten',
			'LNZ'=>'Linz',
			'AUT'=>'Österreich',
			'SZG'=>'Salzburg',
			'VIE'=>'Wien',
			
			
			//Polen
			'KRK'=>'Krakau',
			
			//Portugal
			'FAO'=>'Faro',
			'FNC'=>'Funchal (Madeira)',
			'LIS'=>'Lissabon',
			'PDL'=>'Ponta Delgada',
			'OPO'=>'Porto',
			
			//Rumänien
			'OTP'=>'Bukarest',
			'CND'=>'Constanta',
			
			//Russland
			'DME'=>'Moskau - Domodedovo',
			'LED'=>'St. Petersburg',
			
			
			//Schweden
			'AJR'=>'Arvidsjaur',
			'GOT'=>'Göteborg - Landvetter',
			'ARN'=>'Stockholm - Arlanda',
			'VBY'=>'Visby',
			
			//Schweiz
			'BSL'=>'Basel',
			'GVA'=>'Genf',
			'ZRH'=>'Zürich',
			
			//Serbien
			'BEG'=>'Belgrad',
			
			//Spanien
			'ALC'=>'Alicante',
			'LEI'=>'Almeria',
			'OVD'=>'Asturias/Oviedo',
			'BCN'=>'Barcelona',
			'BIO'=>'Bilbao',
			'FUE'=>'Fuerteventura',
			'LPA'=>'Gran Canaria',
			'IBZ'=>'Ibiza',
			'XRY'=>'Jerez d.l. Frontera',
			'ACE'=>'Lanzarote',
			'MAD'=>'Madrid',
			'MAH'=>'Mahon (Menorca)',
			'AGP'=>'Malaga',
			'MJV'=>'Murcia',
			'PMI'=>'Palma de Mallorca',
			'SCQ'=>'Santiago de Compostela',
			'SVQ'=>'Sevilla',
			'SPC'=>'Sta Cruz (La Palma)',
			'TFN'=>'Teneriffa Nord',
			'TFS'=>'Teneriffa Süd',
			'VLC'=>'Valencia',
			
			//Südafrika
			'CPT'=>'Kapstadt',
			
			//Thailand
			'BKK'=>'Bangkok',
			'CNX'=>'Chiang Mai',
			'USM'=>'Koh Samui',
			'HKT'=>'Phuket',
			
			//Tunesien
			'DJE'=>'Djerba',
			'NBE'=>'Enfidha',
			'MIR'=>'Monastir',
			'TUN'=>'Tunis',
			
			
			//Türkei
			'ADA'=>'Adana',
			'ESB'=>'Ankara',
			'AYT'=>'Antalya',
			'BJV'=>'Bodrum',
			'DLM'=>'Dalaman',
			'DIY'=>'Diyarbakir',
			'EZS'=>'Elazig',
			'GZT'=>'Gaziantep',
			'HTY'=>'Hatay',
			'IST'=>'Istanbul',
			'ADB'=>'Izmir',
			'ASR'=>'Kayseri',
			'KYA'=>'Konya',
			'MLX'=>'Malatya',
			'MQM'=>'Mardin',
			'SZF'=>'Samsun',
			'TZX'=>'Trabzon',
			'VAN'=>'Van',
			
			//USA
			'FLZ'=>'Florida',
			'RSW'=>'Fort Myers',
			'CLF'=>'Kalifornien',
			'LAX'=>'Los Angeles',
			'MIA'=>'Miami',
			'JFK'=>'New York - JFK',
			'SFO'=>'San Francisco',
			
			//Vereinigte Arabische Emirate
			'DXB'=>'Dubai',
			
			
			//Zypern
			'LCA'=>'Larnaca',
			'PFO'=>'Paphos',
			);
	}
	
	if($sp=='es') {
		$citiesValuesForTools = array(
			//ALEMANIA
			'BER'=>'Berlín',
			'BRE'=>'Bremen',
			'KLN'=>'Colonia',
			'BNN'=>'Bonn',
			'DTM'=>'Dortmund',
			'DRS'=>'Dresde',
			'DUS'=>'Dusseldorf',
			'ERF'=>'Erfurt',
			'FRA'=>'Frankfurt',
			'FFO'=>'Frankfurt Oder',
			'FDH'=>'Friedrichshafen',
			'HAM'=>'Hamburgo',
			'HAJ'=>'Hannover',
			'FKB'=>'Karlsruhe/Baden-Baden',
			'LEJ'=>'Leipzig/Halle',
			'MUC'=>'Munich',
			'FMO'=>'Münster/Osnabrück',
			'NRW'=>'Norte de Westfalia',
			'NUE'=>'Nuremberg',
			'PAD'=>'Paderborn/Lippstadt',
			'POS'=>'Potsdam',
			'RLG'=>'Rostock - Laage',
			'SCN'=>'Sarrebruck',
			'STR'=>'Stuttgart',
			'GWT'=>'Sylt',
			'HDF'=>'Usedom',
			'NRN'=>'Weeze',
			
			// ARGELIA
			'ALG'=>'Argel',
			
			// AUSTRIA
			'AUT'=>'Austria',
			'KLU'=>'Carintia',
			'GRZ'=>'Graz',
			'INN'=>'Innsbruck',
			'LNZ'=>'Linz',
			'SZG'=>'Salzburgo',
			'VIE'=>'Viena',
			
			// BULGARIA
			'SOF'=>'Sofia',
			
			// Cambodia
			'PNH'=>'Phnom Penh',
			
			// canada
			'YVR'=>'Vancouver',
			
			// China
			'PEK'=>'Beijing',
			
			//Chile
			'SCL'=>'Santiago de Chile',
			
			// Chipre
			'LCA'=>'Larnaca',
			'PFO'=>'Pafos',
			
			// Croacia
			'DBV'=>'Dubrovnik',
			'RJK'=>'Rijeka',
			'SPU'=>'Split',
			
			// Cuba
			'VRA'=>'Varadero',
			
			// DInamarca
			'RNN'=>'Bornholm',
			'CPH'=>'Copenhague',
			
			// Egipto
			'CAI'=>'El Cairo',
			'HRG'=>'Hurghada',
			'LXR'=>'Luxor',
			'RMF'=>'Marsa Alam',
			'SSH'=>'Sharm el Sheik',
			
			//Emiratos Árabes Unidos
			'DXB'=>'Dubai',
			
			//España
			'ALC'=>'Alicante',
			'LEI'=>'Almería',
			'OVD'=>'Asturias/Oviedo',
			'BCN'=>'Barcelona',
			'BIO'=>'Bilbao',
			'FUE'=>'Fuerteventura',
			'LPA'=>'Gran Canaria',
			'IBZ'=>'Ibiza',
			'XRY'=>'Jerez d.l. Frontera',
			'ACE'=>'Lanzarote',
			'MAD'=>'Madrid',
			'MAH'=>'Mahón (Menorca)',
			'AGP'=>'Málaga',
			'MJV'=>'Murcia',
			'PMI'=>'Palma de Mallorca',
			'SCQ'=>'Santiago de Compostela',
			'SVQ'=>'Sevilla',
			'SPC'=>'Sta Cruz (La Palma)',
			'TFN'=>'Tenerife del Norte',
			'TFS'=>'Tenerife del Sur',
			'VLC'=>'Valencia',
			
			//Estados Unidos
			'CLF'=>'California',
			'FLZ'=>'Florida',
			'RSW'=>'Fort Myers',
			'LAX'=>'Los Ángeles',
			'MIA'=>'Miami',
			'JFK'=>'Nueva York - JFK',
			'SFO'=>'San Francisco',
			
			//Finlandia'HEL'=>'Helsinki',
			
			//Francia
			'CLY'=>'Calvi',
			'NCE'=>'Niza',
			'PAR'=>'Paris',
			'CDG'=>'Paris - Charles de Gaulle',
			'ORY'=>'Paris - Orly',
			
			//Gran Bretaña
			'GCI'=>'Guernsey',
			'JER'=>'Jersey',
			'LON'=>'Londres',
			'LGW'=>'Londres - Gatwick',
			'STN'=>'Londres - Stansted',
			'MAN'=>'Manchester',
			
			//Grecia
			'CHQ'=>'Chania',
			'CFU'=>'Corfu',
			'HER'=>'Heraklion',
			'KLX'=>'Kalamata',
			'AOK'=>'Kárpathos',
			'KVA'=>'Kavala',
			'KGS'=>'Kos',
			'JMK'=>'Mykonos',
			'MJT'=>'Mytilene (Lesbos)',
			'PVK'=>'Preveza',
			'RHO'=>'Rhodos',
			'SMI'=>'Samos',
			'JTR'=>'Santorini',
			'JSI'=>'Skiathos',
			'SKG'=>'Thessaloniki',
			'VOL'=>'Volos',
			'ZTH'=>'Zakynthos',
			
			//Iraq
			'EBL'=>'Arbil',
			
			//Islandia
			'KEF'=>'Reykjavik',
			
			//Israel
			'TLV'=>'Tel Aviv',
			
			//Italia
			'BRI'=>'Bari',
			'BDS'=>'Brindisi',
			'CAG'=>'Cagliari',
			'CTA'=>'Catania',
			'FLR'=>'Florencia',
			'SUF'=>'Lamezia Terme',
			'MIL'=>'Milán',
			'MXP'=>'Milán - Malpensa',
			'NAP'=>'Nápoles',
			'OLB'=>'Olbia',
			'PMO'=>'Palermo',
			'RMI'=>'Rimini',
			'FCO'=>'Roma - Fiumicino',
			'VCE'=>'Venecia',
			'VRN'=>'Verona',
			
			//Jamaica
			'MBJ'=>'Montego Bay',
			
			//Kenia
			'MBA'=>'Mombasa',
			
			//Kosovo
			'PRN'=>'Pristina',
			
			//Maldivas
			'MLE'=>'Male',
			
			//Malta
			'MLA'=>'Malta',
			
			//Marruecos
			'AGA'=>'Agadir',
			'CMN'=>'Casablanca',
			'NDR'=>'Nador',
			'TNG'=>'Tánger',
			
			//México
			'CUN'=>'Cancun',
			
			//Montenegro
			'TIV'=>'Tivat',
			
			
			//Namibia
			'WDH'=>'Windhoek',
			
			//Noruega
			'OSL'=>'Oslo',
			
			//Paises Bajos
			'AMS'=>'Amsterdam',
			
			//Polonia
			'KRK'=>'Cracovia',
			
			//Portugal
			'FAO'=>'Faro',
			'FNC'=>'Funchal (Madeira)',
			'LIS'=>'Lisboa',
			'OPO'=>'Oporto',
			'PDL'=>'Ponta Delgada',
			
			//República Dominicana
			'POP'=>'Puerto Plata',
			'PUJ'=>'Punta Cana',
			
			//Rumania
			'OTP'=>'Bucarest',
			'CND'=>'Constanta',
			
			
			//Rusia
			'DME'=>'Moscú - Domodedovo',
			'LED'=>'San Petersburgo',
			
			//Servia
			'BEG'=>'Belgrado',
			
			//Sudáfrica
			'CPT'=>'Ciudad del Cabo',
			
			
			//Suecia
			'AJR'=>'Arvidsjaur',
			'ARN'=>'Estocolmo - Arlanda',
			'GOT'=>'Gotemburgo - Landvetter',
			'VBY'=>'Visby',
			
			//Suiza
			'BSL'=>'Basel',
			'GVA'=>'Ginebra',
			'ZRH'=>'Zurich',
			
			//Thailand
			'BKK'=>'Bangkok',
			'CNX'=>'Chiang Mai',
			'USM'=>'Koh Samui',
			'HKT'=>'Phuket',
			
			//Túnez
			'DJE'=>'Djerba',
			'NBE'=>'Enfidha',
			'MIR'=>'Monastir',
			'TUN'=>'Túnez',
			
			
			//Turquía
			'ADA'=>'Adana',
			'ESB'=>'Ankara',
			'AYT'=>'Antalya',
			'BJV'=>'Bodrum',
			'DLM'=>'Dalaman',
			'DIY'=>'Diyarbakir',
			'EZS'=>'Elazig',
			'IST'=>'Estambul',
			'GZT'=>'Gaziantep',
			'HTY'=>'Hatay',
			'ADB'=>'Izmir',
			'ASR'=>'Kayseri',
			'KYA'=>'Konya',
			'MLX'=>'Malatya',
			'MQM'=>'Mardin',
			'SZF'=>'Samsun',
			'TZX'=>'Trebisonda',
			'VAN'=>'Van',
		);
		
	}
	
	if($sp=='pl') {
		$citiesValuesForTools = array(
			
			// Polska
			'KRK'=>'Kraków',
		);
	}
	
	if($city=='array') {
		return $citiesValuesForTools;
	} else {
		$citiesValuesForTools = $citiesValuesForTools[$city];
		return strtr($citiesValuesForTools,$errors);
	}
}

?>