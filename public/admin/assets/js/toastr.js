/*
Template Name: Monster Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    
    // Generic toast functions for all CRUD operations using theme colors
    window.showSuccessToast = function(message) {
        $.toast({
            heading: 'Success!',
            text: message,
            position: 'top-right',
            loaderBg: '#3c763d',
            icon: 'success',
            hideAfter: 3500, 
            stack: 6,
            allowToastClose: true,
            showHideTransition: 'fade'
        });
    };
    
    window.showErrorToast = function(message) {
        $.toast({
            heading: 'Error!',
            text: message,
            position: 'top-right',
            loaderBg: '#a94442',
            icon: 'error',
            hideAfter: 4000, 
            stack: 6,
            allowToastClose: true,
            showHideTransition: 'fade'
        });
    };
    
    window.showWarningToast = function(message) {
        $.toast({
            heading: 'Warning!',
            text: message,
            position: 'top-right',
            loaderBg: '#8a6d3b',
            icon: 'warning',
            hideAfter: 3500, 
            stack: 6,
            allowToastClose: true,
            showHideTransition: 'fade'
        });
    };
    
    window.showInfoToast = function(message) {
        $.toast({
            heading: 'Information',
            text: message,
            position: 'top-right',
            loaderBg: '#31708f',
            icon: 'info',
            hideAfter: 3000, 
            stack: 6,
            allowToastClose: true,
            showHideTransition: 'fade'
        });
    };
    
    // Original demo button handlers
    $(".tst1").click(function(){
        showInfoToast('Use the predefined ones, or specify a custom position object.');
    });

    $(".tst2").click(function(){
        showWarningToast('Use the predefined ones, or specify a custom position object.');
    });
    
    $(".tst3").click(function(){
        showSuccessToast('Use the predefined ones, or specify a custom position object.');
    });

    $(".tst4").click(function(){
        showErrorToast('Use the predefined ones, or specify a custom position object.');
    });
});
          
