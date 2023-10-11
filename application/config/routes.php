<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route=array(
    'default_controller' => 'FrontendController/index',
    '(:any)' => 'FrontendController/index/$1',
    
    'portfollio/works/details/(:any)' => 'FrontendController/get_works_details/$1',
    'blog/details/(:any)' => 'FrontendController/get_blog_details/$1',
    
    
    
    

    /* Login Route Start */
    'admin/login'=>'LoginController/index',
    'admin/logout'=>'LoginController/logout',
    //''=>'loginController/authenticate',

    /* Login Route End */

    'user/register'=>'RegistrationController/index',
    //store data on this route
    'register/user'=>'RegistrationController/add_data',






    'admin/dashboard'=>'Dashboard/index',

    /* Template Route */
    'admin/template'=>'NewTemplateController/index',
    'admin/template/get'=>'NewTemplateController/get_template',
    'admin/template/add'=>'NewTemplateController/add_template',
    'admin/template/approve'=>'NewTemplateController/approve',

    /* Home Route */
    'admin/home'=>'HomeController/index',
    'admin/home/add'=>'HomeController/add_home',
    'admin/home/get'=>'HomeController/get_home', 
    'admin/home/delete'=>'HomeController/delete_home',
    'admin/home/update'=>'HomeController/update_home',


    /* Service Route */
    'admin/service'=>'ServiceController/index',
    'admin/service/delete'=>'ServiceController/delete_service',
    'admin/service/add'=>'ServiceController/add_service',
    'admin/service/get'=>'ServiceController/get_service',
    'admin/service/update'=>'ServiceController/update_service',
    


     /* About Route */
    'admin/about'=>'AboutController/index',
    'admin/about/add'=>'AboutController/add_about',
    'admin/about/get'=>'AboutController/get_about',
    'admin/about/delete'=>'AboutController/delete_about',
    'admin/about/update'=>'AboutController/update_about', 

     /* Section One Route */
    'admin/about/section/one'=>'About/Section/SectionOneController/index',
    'admin/about/section/one/add'=>'About/Section/SectionOneController/add_data',
    'admin/about/section/one/update'=>'About/Section/SectionOneController/update_data',
    'admin/about/section/one/get'=>'About/Section/SectionOneController/get_data',
    'admin/about/section/one/delete'=>'About/Section/SectionOneController/delete_data',
    

     /* Section Two Route */
    'admin/about/section/two'=>'About/Section/SectionTwoController/index',
    'admin/about/section/two/update'=>'About/Section/SectionTwoController/update_data',
    

     /* Section Three Route */
     'admin/about/section/three'=>'About/Section/SectionThreeController/index',
     'admin/about/section/three/add'=>'About/Section/SectionThreeController/add_data',
     'admin/about/section/three/update'=>'About/Section/SectionThreeController/update_data',
     'admin/about/section/three/get'=>'About/Section/SectionThreeController/get_data',
     'admin/about/section/three/delete'=>'About/Section/SectionThreeController/delete_data',

    /* Blog Route */
    'admin/blog'=>'BlogController/index',
    'admin/blog/get'=>'BlogController/blog_get',
    'admin/blog/add'=>'BlogController/add_blog',
    'admin/blog/update'=>'BlogController/update_blog',
    'admin/blog/delete'=>'BlogController/delete_data',



     /* Blog Comment  Route */
    'admin/blog/comment'=>'BlogCommentController/index',
    'admin/blog/comment/approve'=>'BlogCommentController/approve_comment',
    'admin/blog/comment/add'=>'BlogCommentController/add_comment',


    /* Contract  Route */
     'admin/contract'=>'ContractController/index',
     'admin/contract/delete'=>'ContractController/delete_data',
     'admin/contract/add'=>'ContractController/add_contract',
     'admin/contract/get'=>'ContractController/get_contract',
     'admin/contract/update'=>'ContractController/update_contract',

     /*Educational  Route */
     'admin/education'=>'EducationController/index',
     'admin/education/add'=>'EducationController/add_education',
     'admin/education/delete'=>'EducationController/delete_education',
     'admin/education/get'=>'EducationController/get_education',
     'admin/education/update'=>'EducationController/update_education',


    /*Experience  Route */
    'admin/experience'=>'ExperienceController/index',
    'admin/experience/delete'=>'ExperienceController/delete_experience',
    'admin/experience/add'=>'ExperienceController/add_experience',
    'admin/experience/update'=>'ExperienceController/update_experience',
    'admin/experience/get'=>'ExperienceController/get_experience',

    /*Category  Route */
    'admin/category'=>'CategoryController/index',
    'admin/category/add'=>'CategoryController/add_category',
    'admin/category/delete'=>'CategoryController/delete_category',
    'admin/category/get'=>'CategoryController/get_category',
    'admin/category/update'=>'CategoryController/update_category',

    /*recent work  Route */
    'admin/work'=>'WorkController/index',
    'admin/work/add'=>'WorkController/add_work',
    'admin/work/delete'=>'WorkController/delete_work',
    'admin/work/get'=>'WorkController/get_work',
    'admin/work/update'=>'WorkController/update_work',


    'admin/work/details'=>'Work_detailsController/index',
    'admin/work/details/add'=>'Work_detailsController/add_data',
    'admin/work/details/delete'=>'Work_detailsController/delete_data',
    'admin/work/details/get'=>'Work_detailsController/get_data',


    /* Design Skill  Route */
    'admin/design/skill'=>'DesignController/index',
    'admin/design/skill/add'=>'DesignController/add_design_skill',
    'admin/design/skill/delete'=>'DesignController/delete_data',
    'admin/design/skill/get'=>'DesignController/get_data',
    'admin/design/skill/update'=>'DesignController/update_data',

    /* Language  Route */
    'admin/language'=>'LanguageController/index',
    'admin/language/add'=>'LanguageController/add_language',
    'admin/language/update'=>'LanguageController/update_data',
    'admin/language/get'=>'LanguageController/get_data',
    'admin/language/delete'=>'LanguageController/delete_data',

    /* Testimonial  Route */
    'admin/testimonial'=>'TestimonialController/index',
    'admin/testimonial/add'=>'TestimonialController/add_testimonial',
    'admin/testimonial/get'=>'TestimonialController/get_testimonial',
    'admin/testimonial/update'=>'TestimonialController/update_testimonial',
    'admin/testimonial/delete'=>'TestimonialController/delete_data',

    /* Message  Route */ 
    'admin/message'=>'MessageController/index',
    'admin/message/delete'=>'MessageController/delete_message',
    'admin/message/add'=>'MessageController/add_message',




     /* Site Setting  Route */ 
     'admin/setting/social'=>'SiteController/index',
     'admin/setting/social/update'=>'SiteController/update_data',
     'admin/setting/social/delete'=>'SiteController/delete_data',
     'admin/setting/social/get'=>'SiteController/get_data',
     'admin/setting/social/add'=>'SiteController/add_data',

     /* Site Setting Profile  Route */ 
     'admin/setting/profile'=>'ProfileController/index',
     'admin/setting/profile/add'=>'ProfileController/update_profile',
     
     /* Uses  Route */ 
     'admin/users'=>'UserController/index',
     'admin/users/add'=>'UserController/add_data',
     'admin/users/get'=>'UserController/get_data',
     'admin/users/update'=>'UserController/update_data',
     'admin/users/delete'=>'UserController/delete_data',
     'admin/users/approve'=>'UserController/approve_data',
);
