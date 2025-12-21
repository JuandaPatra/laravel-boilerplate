<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail) {
    $trail->push('Product', route('product.index'));
});

Breadcrumbs::for('product-add', function (BreadcrumbTrail $trail) {
    $trail->parent('product');
    $trail->push('Add ', route('product.create'));
});

Breadcrumbs::for('product-edit', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('product');
    $trail->push('Edit / '. $product->slug, route('product.edit', $product->slug));
});

Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('role-edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles');
    $trail->push('Edit / '. $role->id, route('roles.edit', $role->id));
});