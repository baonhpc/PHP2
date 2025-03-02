<?php

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
use Src\Models\Client\SearchModel;
use Src\Notifications\Notification;

class SearchController extends BaseController {

    public function show() {
        echo $this->view->render('Client/Components/Search', ['Name' => 'Bao']);
    }

    public function search()
    {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $keyword = $_GET['search'];
            $SearchModel = new SearchModel();
            $data = $SearchModel->search($keyword);
            Notification::success('Thành công', 'Tìm kiếm thành công');
            echo $this->view->render('Client/Components/Search', [
                'data' => $data,
                'keyword' => $keyword,

            ]);
        } else {
            Notification::error('Thất bại', 'Xảy ra lỗi khi tìm kiếm');
            header('Location: /');
        }
    }
}