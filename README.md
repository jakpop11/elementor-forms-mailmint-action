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
<!-- ![Screenshot](/screenshots/img.jpg?raw=true "Title") -->
**Elementor Forms MailMint Action** is a WordPress plugin designed to seamlessly integrate Elementor forms with MailMint. This plugin enables you to automatically add new subscribers to your MailMint mailing lists every time an Elementor form is submitted on your site. By bridging the gap between your forms and your email marketing efforts, this addon streamlines the process of growing your subscriber base and enhances your email marketing strategy.


### Features:
- [x] Use Elementor form to add subscriber to MailMint list and tag
- [x] Custom Elementor form Action After Submit settings
- [x] Set List that subscriber will be added to
- [x] Set Tag that subscriber will be assigned to
- [ ] Set subscriber name with additional Elementor form fields
- [ ] Set subscriber meta data (localization, telephone number) with additional Elementor form fields


### Used technology:
<p>
  <a href="https://skillicons.dev">
    <img height="32" align="center" alt="Languages" src="https://skillicons.dev/icons?i=php" />
  </a>
</p>


### Requirements:
<ul>
  <li><a href="https://wordpress.org/plugins/elementor/">Elementor PRO</a> (tested up to: 3.21.0)</li>
  <li><a href="https://wordpress.org/plugins/mail-mint/">MailMint</a> (tested up to: 1.11.1)</li>
  <li><a href="https://wordpress.org/">WordPress</a> (tested up to: 6.5.3)</li>
</ul>


## Installation
1. Download this project from GitHub as ZIP
2. On your website go to *Add new plugins* page and on top of the page use *Upload plugin* button
3. Select downloaded ZIP
4. Install and activate plugin


## How to use
1. Create Elementor form and add needed fields (e-mail is required)
2. In E-mail field advance settings set id to `email`
3. In Action After Submit menu add `MailMint` action
4. In new menu - MailMint, enter needed data - list id, tag id (you can find those innspecting MailMint dashboard with your browser)
5. Save and publish form. After that you should be able to subscribe to MailMint list with this Elementor form


<!-- ## License -->
