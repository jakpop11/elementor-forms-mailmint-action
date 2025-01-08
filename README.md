<!-- ![Project icon](/relative/path/to/icon.svg?raw=true&sanitize=true "Optional title")  -->
<h3 align="center">Elementor Forms Mailmint Action</h3>
<p align="center">Custom Wordpress addon which adds new subscriber to MailMint after Elementor form submission</p>

<details>
  <summary>Contents</summary>
  <ol>
    <li><a href="#About-project">About project</a></li>
    <ul>
      <li><a href="#Features">Features</a></li>
      <li><a href="#Used-technology">Used technology</a></li>
      <li><a href="#Requirements">Requirements</a></li>
    </ul>
    <li><a href="#Installation">Installation</a></li>
    <li><a href="#How-to-use">How to use</a></li>
    <li><a href="#License">License</a></li>
  </ol>
</details>


## About project
**Elementor Forms MailMint Action** is a WordPress plugin designed to seamlessly integrate Elementor forms with MailMint. This plugin enables you to automatically add new subscribers to your MailMint mailing lists every time an Elementor form is submitted on your site. By bridging the gap between your forms and your email marketing efforts, this addon streamlines the process of growing your subscriber base and enhances your email marketing strategy.

![ActionAfterSubmitSetup](https://github.com/user-attachments/assets/c7bfbbe7-22f6-43f7-ae7a-ce416f93dac6)


### Features:
- [x] Use Elementor form to add subscriber to MailMint list and tag
- [x] Custom Elementor form Action After Submit settings
- [x] Set List that subscriber will be added to
- [x] Set Tag that subscriber will be assigned to
- [x] Set subscriber name with additional Elementor form fields
- [x] Set subscriber meta data (localization, telephone number) with additional Elementor form fields
- [x] Trigger `mailmint_after_form_submit` after Elementor form with custom action submission


### Used technology:
<p>
  <a href="https://skillicons.dev">
    <img height="32" align="center" alt="Languages" src="https://skillicons.dev/icons?i=php" />
  </a>
</p>


### Requirements:
<ul>
  <li><a href="https://wordpress.org/plugins/elementor/">Elementor PRO</a> (tested up to: 3.26.4)</li>
  <li><a href="https://wordpress.org/plugins/mail-mint/">MailMint</a> (tested up to: 1.16.4)</li>
  <li><a href="https://wordpress.org/">WordPress</a> (tested up to: 6.7.1)</li>
</ul>


## Installation
1. Download this project from GitHub as ZIP
2. On your website go to *Add new plugins* page and on top of the page use *Upload plugin* button
3. Select downloaded ZIP
4. Install and activate plugin


## How to use
1. Create Elementor form and add needed fields (e-mail is required)
2. In E-mail field advance settings set id to `email`
3. [OPTIONAL] Repeat step #2 for other fields by setting the following IDs: `first_name`, `last_name`, `phone`, and `country`. For a better user experience, set the phone field type to **Tel**, and the country field type to **select**. For the country select field options, you can use the list of countries provided below.
4. In Action After Submit menu add `MailMint` action
5. In new menu - MailMint, enter data as needed - list id, tag id (you can find those innspecting MailMint dashboard with your browser)
6. Save and publish form. After that you should be able to subscribe to MailMint list with this Elementor form

[OPTIONAL] Trigger action after form is submitted
1. Create default form and give it descriptive name (e.g. "NewsletterForm"). Publish and activate form
2. Copy created MailMint form id from shortcode section (e.g.: "1") 
3. In Elementor form under MailMint, enter copied MailMint form id in the form id field. Publish changes
4. Setup MailMint Automation using `Form Submitted` trigger and selecting name of MailMint form (e.g. "NewsletterForm")
5. Publish and activate automation

<details>
  <summary>How to get list id</summary>
  
  ![HowToGetListId](https://github.com/jakpop11/elementor-forms-mailmint-action/assets/104214436/9a28e7dd-d6ea-4132-8b0b-12ea5551b681)  
  ![ActionAfterSubmitSetup](https://github.com/jakpop11/elementor-forms-mailmint-action/assets/104214436/2e6e717b-3f1e-455c-96cd-36660f9ae941)
</details>

<details>
  <summary>How to get form id</summary>

  ![HowToGetFormId](https://github.com/user-attachments/assets/7ca94918-799a-4a4a-b34b-cff94f99e07f)
  ![ActionAfterSubmitSetup](https://github.com/user-attachments/assets/c7bfbbe7-22f6-43f7-ae7a-ce416f93dac6)
</details>

<details>
  <summary>How to setup field id</summary>
  
  ![FormFieldid](https://github.com/jakpop11/elementor-forms-mailmint-action/assets/104214436/446df486-8c0f-4668-b109-29a76c1fa440)
</details>

<details>
  <summary>How to setup MailMint Automation</summary>
  
  ![AutomationSetup](https://github.com/user-attachments/assets/a11220c6-e4bd-495c-94c1-118beda405d2)
  ![HowToGetFormId](https://github.com/user-attachments/assets/7ca94918-799a-4a4a-b34b-cff94f99e07f)
</details>

<details>
  <summary>How to setup country field</summary>

  ![CountryFieldSetup](https://github.com/jakpop11/elementor-forms-mailmint-action/assets/104214436/34d6fe9f-7ab1-4fd2-9b5c-6da8b8568993)
</details>

<details>
  <summary>List of Countries</summary>
  <pre>
- Select - | 
Afghanistan
Åland Islands
Albania
Algeria
American Samoa
Andorra
Angola
Anguilla
Antarctica
Antigua and Barbuda
Argentina
Armenia
Aruba
Australia
Austria
Azerbaijan
Bahamas
Bahrain
Bangladesh
Barbados
Belarus
Belgium
Belau
Belize
Benin
Bermuda
Bhutan
Bolivia
Bonaire, Saint Eustatius and Saba
Bosnia and Herzegovina
Botswana
Bouvet Island
Brazil
British Indian Ocean Territory
Brunei
Bulgaria
Burkina Faso
Burundi
Cambodia
Cameroon
Canada
Cape Verde
Cayman Islands
Central African Republic
Chad
Chile
China
Christmas Island
Cocos (Keeling) Islands
Colombia
Comoros
Congo (Brazzaville)
Congo (Kinshasa)
Cook Islands
Costa Rica
Croatia
Cuba
Cura&ccedil;ao
Cyprus
Czechia (Czech Republic)
Denmark
Djibouti
Dominica
Dominican Republic
Ecuador
Egypt
El Salvador
Equatorial Guinea
Eritrea
Estonia
Ethiopia
Falkland Islands
Faroe Islands
Fiji
Finland
France
French Guiana
French Polynesia
French Southern Territories
Gabon
Gambia
Georgia
Germany
Ghana
Gibraltar
Greece
Greenland
Grenada
Guadeloupe
Guam
Guatemala
Guernsey
Guinea
Guinea-Bissau
Guyana
Haiti
Heard Island and McDonald Islands
Honduras
Hong Kong
Hungary
Iceland
India
Indonesia
Iran
Iraq
Ireland
Isle of Man
Israel
Italy
Ivory Coast
Jamaica
Japan
Jersey
Jordan
Kazakhstan
Kenya
Kiribati
Kuwait
Kosovo
Kyrgyzstan
Laos
Latvia
Lebanon
Lesotho
Liberia
Libya
Liechtenstein
Lithuania
Luxembourg
Macao
North Macedonia
Madagascar
Malawi
Malaysia
Maldives
Mali
Malta
Marshall Islands
Martinique
Mauritania
Mauritius
Mayotte
Mexico
Micronesia
Moldova
Monaco
Mongolia
Montenegro
Montserrat
Morocco
Mozambique
Myanmar
Namibia
Nauru
Nepal
Netherlands
New Caledonia
New Zealand
Nicaragua
Niger
Nigeria
Niue
Norfolk Island
Northern Mariana Islands
North Korea
Norway
Oman
Pakistan
Palestinian Territory
Panama
Papua New Guinea
Paraguay
Peru
Philippines
Pitcairn
Poland
Portugal
Puerto Rico
Qatar
Reunion
Romania
Russia
Rwanda
Saint Barth&eacute;lemy
Saint Helena
Saint Kitts and Nevis
Saint Lucia
Saint Martin (French part)
Saint Martin (Dutch part)
Saint Pierre and Miquelon
Saint Vincent and the Grenadines
San Marino
S&atilde;o Tom&eacute; and Pr&iacute;ncipe
Saudi Arabia
Senegal
Serbia
Seychelles
Sierra Leone
Singapore
Slovakia
Slovenia
Solomon Islands
Somalia
South Africa
South Georgia/Sandwich Islands
South Korea
South Sudan
Spain
Sri Lanka
Sudan
Suriname
Svalbard and Jan Mayen
Swaziland
Sweden
Switzerland
Syria
Taiwan
Tajikistan
Tanzania
Thailand
Timor-Leste
Togo
Tokelau
Tonga
Trinidad and Tobago
Tunisia
Turkey
Turkmenistan
Turks and Caicos Islands
Tuvalu
Uganda
Ukraine
United Arab Emirates
United Kingdom (UK)
United States (US)
United States (US) Minor Outlying Islands
Uruguay
Uzbekistan
Vanuatu
Vatican
Venezuela
Vietnam
Virgin Islands (British)
Virgin Islands (US)
Wallis and Futuna
Western Sahara
Samoa
Yemen
Zambia
Zimbabwe
  </pre>
</details>

<!-- ## License -->
