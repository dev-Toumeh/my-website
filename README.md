# TYPO3 Extension User Documentation

## Introduction

- **Purpose:** This TYPO3 extension serves as a portfolio website, allowing users to showcase their work..
- **Version :** 1.0.0

## Installation

- **Requirements:**
  - Compatible with TYPO3 versions 12.4.0^ (I didn't test it with Version 13)
  - PHP >= 8.1.0 <= 8.3.99
  - Composer >= 2.1
- **Installation Steps:**
    1. Install TYPO3
       1. Using DDEV 
       2. Use my own Docker typo3 Development environment (Still in beta Version)
    2. Add the extension using composer
       1. DDEV
            1. ddev composer config repositories.my-website vcs https://github.com/dev-Toumeh/typo3-Portfolio-extension
            2. ddev composer require toumeh/my-website:^1.0
       2. Docker or local Environment 
           1. composer config repositories.my-website vcs https://github.com/dev-Toumeh/typo3-Portfolio-extension
           2. composer require toumeh/my-website:^1.0
    3. Clear cache 
    4. After you installed the extension you can check it by Navigation to Admin Tools in typo3 backend Interface and than Extensions than type my-website into search section see the following image.
    5. Create two pages: 'Home' and 'Contact'

        - In the 'Home' page, 
          - add the 'Active Home Page Plugin'
          
            ![Alt text](assets/home-plugin.png)
          
          - Your Segment should look like this
          
            ![Alt text](assets/home-segment.png) 
          
        - in Page 'Contact' 
          - add the 'active json response plugin' 
          
            ![Alt text](assets/json-plugin.png)
          
          - Your Segment should look like this
          
            ![Alt text](assets/json-segment.png)
          
- **Configuration:**
    - add your GitHub page by going to list Module -> Create new Record -> Urls -> choice GitHub
    - add your linden profile link by going to list Module -> Create new Record -> choice LinkedIn
    - add Resume Page fields Experiences, Education Technologies and skills by creating the relevant Records.
    - The same apply for Projects Page
    - adding the contact Email Page configuration needs from you to register on sendgrid.com and tha add your contact data inside the following page in the extension
      Classes/Service/MyWebsiteService.php
      ![Alt text](assets/email-config.png)
    - **I'm currently working on integrating the extension with Typo3 SMTP functionalities, so the email would be adaptable directly from the Backend Interface, which will be available in the forthcoming update.**

    
## Troubleshooting


## FAQs

- no Question Until now

## Changelog

- [Keep a record of changes, versions, and updates]

## Contact and Support Information

- For support, contact dev.toumeh@gmail.com
