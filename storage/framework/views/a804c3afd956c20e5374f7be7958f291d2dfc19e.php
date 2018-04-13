<?php $__env->startSection('title'); ?><?php echo $seo['title']; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('site_description'); ?><?php echo $seo['description']; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('site_keywords'); ?><?php echo $seo['keywords']; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('site_name'); ?><?php echo $settingArr['site_name']; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('favicon'); ?><?php echo Helper::showImage($settingArr['favicon']); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('logo'); ?><?php echo Helper::showImage($settingArr['logo']); ?><?php $__env->stopSection(); ?>

