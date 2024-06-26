<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "Usr\Home::index");
$routes->get("/home", "Usr\Home::index");
$routes->get("/home/home", "Usr\Home::home");
$routes->get("/menu", "Usr\Menu::index");
$routes->get("/menu/menu1", "Usr\Menu::menu1");
$routes->get("/menu/menu2", "Usr\Menu::menu2");
$routes->get("/member/myinfo", "Usr\Member::myinfo");
$routes->get("/member/login", "Usr\Member::login");
$routes->get("/member/join", "Usr\Member::join");
$routes->post("/member/signup", "Usr\Member::signup");
$routes->post("/member/signin", "Usr\Member::signin");
$routes->get("/member/logout", "Usr\Member::logout");
$routes->post("/member/duplicate", "Usr\Member::duplicate");
$routes->get("/member/view", "Usr\Member::view");
$routes->get("/member/edit", "Usr\Member::edit");
$routes->post("/member/update", "Usr\Member::update");
$routes->get("/member/leave", "Usr\Member::leave");
$routes->post("/member/delete", "Usr\Member::delete");

$routes->get("/password/find", "Usr\Password::find");
$routes->post("/password/send", "Usr\Password::send");
$routes->get("/password/forgot", "Usr\Password::forgot");
$routes->post("/password/password", "Usr\Password::password");
$routes->get("/password/reset/(:any)", "Usr\Password::reset");
$routes->post("/password/update", "Usr\Password::update");
$routes->get("/password/confirm", "Usr\Password::confirm");
$routes->post("/password/search", "Usr\Password::search");
$routes->get("/password/modify", "Usr\Password::modify");
$routes->post("/password/change", "Usr\Password::change");

$routes->get("/board", "Usr\Board::index");
$routes->get("/board/(:alpha)/list", "Usr\Board::list");
$routes->get("/board/(:alpha)/view/(:num)", "Usr\Board::view");
$routes->get("/board/(:alpha)/write", "Usr\Board::write");
$routes->get("/board/(:alpha)/edit/(:num)", "Usr\Board::edit");
$routes->post("/board/(:alpha)/update", "Usr\Board::update");
$routes->post("/board/(:alpha)/delete/(:num)", "Usr\Board::delete");
$routes->post("/file/upload", "Usr\File::upload");
$routes->get("/file/view/(:alphanum)", "Usr\File::view");
$routes->get("/file/download/(:alphanum)", "Usr\File::download");

$routes->get("/contents/view/(:num)", "Usr\Contents::view");

$routes->post("/popup/disabled/(:num)/(:num)", "Usr\Popup::disabled");

$routes->post("/ask/write", "Usr\Ask::write");

$routes->get("/s/(:num)", "Usr\Shortlink::hyperlink");














// 관리자
$routes->get("/csl", "Csl\Member::index");
$routes->get("/csl/member", "Csl\Member::index");
$routes->get("/csl/member/list", "Csl\Member::list");
$routes->get("/csl/member/view/(:alphanum)", "Csl\Member::view");
$routes->get("/csl/member/edit/(:alphanum)", "Csl\Member::edit");
$routes->post("/csl/member/update", "Csl\Member::update");
$routes->post("/csl/member/delete/(:alphanum)", "Csl\Member::delete");
$routes->get("/csl/member/excel", "Csl\Member::excel");

$routes->get("/csl/board/(:alpha)/list", "Csl\Board::list");
$routes->get("/csl/board/(:alpha)/write", "Csl\Board::write");
$routes->get("/csl/board/(:alpha)/edit/(:num)", "Csl\Board::edit");
$routes->post("/csl/board/(:alpha)/update", "Csl\Board::update");
$routes->get("/csl/board/(:alpha)/view/(:num)", "Csl\Board::view");
$routes->post("/csl/board/(:alpha)/delete/(:num)", "Csl\Board::delete");

$routes->post("/csl/file/upload", "Csl\File::upload");
$routes->post("/csl/file/list", "Csl\File::list");
$routes->get("/csl/file/view/(:alphanum)", "Csl\File::view");
$routes->get("/csl/file/download/(:alphanum)", "Csl\File::download");

$routes->post("/csl/comment/insert", "Csl\Comment::insert");
$routes->post("/csl/comment/delete/(:num)", "Csl\Comment::delete");
$routes->post("/csl/comment/edit/(:num)", "Csl\Comment::edit");
$routes->post("/csl/comment/update", "Csl\Comment::update");

$routes->post("/comment/insert", "Usr\Comment::insert");
$routes->post("/comment/delete/(:num)", "Usr\Comment::delete");
$routes->post("/comment/edit/(:num)", "Usr\Comment::edit");
$routes->post("/comment/update", "Usr\Comment::update");

$routes->get("/csl/slide/list", "Csl\Slide::list");
$routes->get("/csl/slide/write", "Csl\Slide::write");
$routes->get("/csl/slide/edit/(:num)", "Csl\Slide::edit");
$routes->post("/csl/slide/update", "Csl\Slide::update");
$routes->get("/csl/slide/view/(:num)", "Csl\Slide::view");
$routes->post("/csl/slide/delete/(:num)", "Csl\Slide::delete");

$routes->get("/csl/contents/list", "Csl\Contents::list");
$routes->get("/csl/contents/write", "Csl\Contents::write");
$routes->get("/csl/contents/edit/(:num)", "Csl\Contents::edit");
$routes->post("/csl/contents/update", "Csl\Contents::update");
$routes->get("/csl/contents/view/(:num)", "Csl\Contents::view");
$routes->post("/csl/contents/delete/(:num)", "Csl\Contents::delete");

$routes->post("/mail/send", "Usr\Mail::send");

$routes->get("/csl/bulk/list", "Csl\Bulk::list"); // 벌크로 작업올린 목록
$routes->get("/csl/bulk/excel/write", "Csl\Bulk::excelWrite"); // 벌크 작업 올리기
$routes->post("/csl/bulk/excel/upload", "Csl\Bulk::excelUpload"); // 벌크 작업 저장 로직
$routes->get("/csl/bulk/detail/(:num)", "Csl\Bulk::detail"); // 벌크로 올린 작업의 상세 목록
$routes->get("/csl/bulk/view/(:num)", "Csl\Bulk::view");  // 상세 목록의 세부 정보 보기
$routes->get("/csl/bulk/edit/(:num)", "Csl\Bulk::edit"); // 데이터 수정
$routes->post("/csl/bulk/update", "Csl\Bulk::update"); // 수정 로직
$routes->post("/csl/bulk/delete/(:num)/(:num)", "Csl\Bulk::delete"); // 삭제 로직

$routes->get("/csl/menu/list", "Csl\Menu::list");
$routes->get("/csl/menu/write/(:num)", "Csl\Menu::write");
$routes->get("/csl/menu/edit/(:num)", "Csl\Menu::edit");
$routes->post("/csl/menu/update", "Csl\Menu::update");
$routes->get("/csl/menu/view/(:num)", "Csl\Menu::view");
$routes->post("/csl/menu/delete/(:num)", "Csl\Menu::delete");

$routes->get("/csl/popup/list", "Csl\Popup::list");
$routes->get("/csl/popup/write", "Csl\Popup::write");
$routes->get("/csl/popup/edit/(:num)", "Csl\Popup::edit");
$routes->post("/csl/popup/update", "Csl\Popup::update");
$routes->get("/csl/popup/view/(:num)", "Csl\Popup::view");
$routes->post("/csl/popup/delete/(:num)", "Csl\Popup::delete");

$routes->get("/csl/ask/list", "Csl\Ask::list");
$routes->post("/csl/ask/delete/(:num)", "Csl\Ask::delete");

$routes->get("/csl/shortlink/list", "Csl\Shortlink::list");
$routes->get("/csl/shortlink/write", "Csl\Shortlink::write");
$routes->get("/csl/shortlink/edit/(:num)", "Csl\Shortlink::edit");
$routes->post("/csl/shortlink/update", "Csl\Shortlink::update");
$routes->get("/csl/shortlink/view/(:num)", "Csl\Shortlink::view");
$routes->post("/csl/shortlink/delete/(:num)", "Csl\Shortlink::delete");

$routes->get("/csl/privacy", "Csl\Privacy::index");
$routes->get("/csl/privacy/list", "Csl\Privacy::list");

