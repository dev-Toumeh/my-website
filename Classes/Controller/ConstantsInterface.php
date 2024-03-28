<?php

namespace Toumeh\MyWebsite\Controller;

interface ConstantsInterface
{
    // View Template Sections
    public const string SECTIONS = 'sections';
    public const array INDEX_SECTIONS = ['header', 'about'];
    public const array RESUME_SECTIONS = ['resume'];
    public const array PROJECTS_SECTIONS = ['projects', 'Call-to-action'];
    public const array CONTACT_SECTIONS = ['contact'];

    public const array ACTIONS_SECTIONS = [
        self::INDEX => self::INDEX_SECTIONS,
        self::RESUME => self::RESUME_SECTIONS,
        self::PROJECTS => self::PROJECTS_SECTIONS,
        self::CONTACT => self::CONTACT_SECTIONS,
    ];

    // Templates Paths
    public const string TEMPLATE_PATH = __DIR__ . '/../../Resources/Private/Templates/Home/';
    public const string LAYOUT_PATH = __DIR__ . '/../../Resources/Private/layout/Default/';
    public const string PARTIALS_PATH = __DIR__ . '/../../Resources/Private/partials/';

    // json Controller Constants
    public const string MESSAGE = 'message';
    public const string SUCCESS = 'success';
    public const string ERROR_PREDEFINED_MESSAGE = 'There was a problem sending your message. Please try again later.';
    public const string SUCCESS_MESSAGE = 'Your message has been sent successfully.';

    // general
    public const string EXTBASE = 'extbase';
    public const string INDEX = 'index';
    public const string CONTACT = 'contact';
    public const string RESUME = 'resume';
    public const string PROJECTS = 'projects';
    public const string PAGES = 'pages';
    public const string EXTERN_URLS = 'externUrls';
    public const string EXPERIENCES = 'experiences';
    public const string EDUCATIONS = 'educations';
    public const string SKILLS = 'skills';
}