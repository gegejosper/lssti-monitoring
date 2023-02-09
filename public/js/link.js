$(document).ready(function() {
    
    $(function () {
        var url = window.location.pathname;
        var route = window.location.pathname.split("/")[1];
        var route2 = window.location.pathname.split("/")[2];
        var route3 = window.location.pathname.split("/")[3];
        var route4 = window.location.pathname.split("/")[4];
        //console.log(route3);
        if(route2 == 'admin' && route3 == null){
            $('#admin_dashboard').addClass('menu-item-active');
        }
        if(route2 == 'admin' && route3 == 'plans'){
            $('#admin_plans').addClass('menu-item-active');
        }
        if(route2 == 'admin' && route3 == 'employees'){
            $('#admin_employees').addClass('menu-item-active');
        } 
        if(route2 == 'admin' && route3 == 'subscribers'){
            $('#admin_subscribers').addClass('menu-item-active');
        } 
        if(route2 == 'admin' && route3 == 'applications'){
            $('#admin_applications').addClass('menu-item-active');
        } 
        if(route2 == 'admin' && route3 == 'packages'){
            $('#admin_packages').addClass('menu-item-active');
        } 
        if(route2 == 'admin' && route3 == 'products'){
            $('#admin_products').addClass('menu-item-active');
        }
        if(route2 == 'admin' && route3 == 'settings'){
            $('#admin_settings').addClass('menu-item-active');
        }
    });
});