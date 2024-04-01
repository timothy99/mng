<?php

namespace App\Models\Csl;

use CodeIgniter\Model;
use Throwable;

class BoardModel extends Model
{
    public function getBoardList($data)
    {
        $result = true;
        $message = "목록 불러오기가 완료되었습니다.";

        $rows = $data["rows"];
        $page = $data["page"];
        $board_id = $data["board_id"];

        $search_arr = $data["search_arr"];
        $search_condition = $search_arr["search_condition"];
        $search_text = base64_encode($search_arr["search_text"]);

        // 오프셋 계산
        $offset = ($page-1)*$rows;
        if ($offset < 0) {
            $offset = 0;
        }

        $db = db_connect();
        $builder = $db->table("mng_board");
        $builder->select("*");
        $builder->where("del_yn", "N");
        $builder->like($search_condition, $search_text);
        $builder->where("board_id", $board_id);
        $cnt = $builder->countAllResults(false);
        $list = $builder->get()->getResult();

        $proc_result = array();
        $proc_result["result"] = $result;
        $proc_result["message"] = $message;
        $proc_result["list"] = $list;
        $proc_result["cnt"] = $cnt;

        return $proc_result;
    }

    public function getBoardInfo($b_idx)
    {
        $result = true;
        $message = "목록 불러오기가 완료되었습니다.";

        $db = db_connect();
        $builder = $db->table("mng_board");
        $builder->select("*");
        $builder->where("del_yn", "N");
        $builder->where("b_idx", $b_idx);
        $info = $builder->get()->getRow();

        $proc_result = array();
        $proc_result["result"] = $result;
        $proc_result["message"] = $message;
        $proc_result["info"] = $info;

        return $proc_result;
    }

    // 게시판 입력
    public function procBoardInsert($data)
    {
        // 게시판 입력과 관련된 기본 정보
        $user_id = getUserSessionInfo("member_id");
        $today = date("YmdHis");

        $result = true;
        $message = "입력이 잘 되었습니다";

        $title = $data["title"];
        $contents = $data["contents"];
        $board_id = $data["board_id"];
        $file_idxs = $data["file_idxs"];

        try {
            $db = db_connect();
            $db->transStart();
            $builder = $db->table("mng_board");
            $builder->set("board_id", $board_id);
            $builder->set("title", $title);
            $builder->set("contents", $contents);
            $builder->set("file_idxs", $file_idxs);
            $builder->set("del_yn", "N");
            $builder->set("ins_id", $user_id);
            $builder->set("ins_date", $today);
            $builder->set("upd_id", $user_id);
            $builder->set("upd_date", $today);
            $result = $builder->insert();
            $insert_id = $db->insertID();
            $db->transComplete();
        } catch (Throwable $t) {
            $result = false;
            $message = "입력에 오류가 발생했습니다.";
            logMessage($t->getMessage());
            $db->transRollback();
        }

        $model_result = array();
        $model_result["result"] = $result;
        $model_result["message"] = $message;
        $model_result["insert_id"] = $insert_id;

        return $model_result;
    }

    // 게시판 입력
    public function procBoardUpdate($data)
    {
        // 게시판 입력과 관련된 기본 정보
        $user_id = getUserSessionInfo("member_id");
        $today = date("YmdHis");

        $result = true;
        $message = "입력이 잘 되었습니다";

        $title = $data["title"];
        $contents = $data["contents"];
        $b_idx = $data["b_idx"];
        $board_id = $data["board_id"];
        $file_idxs = $data["file_idxs"];

        try {
            $db = db_connect();
            $db->transStart();
            $builder = $db->table("mng_board");
            $builder->set("board_id", $board_id);
            $builder->set("title", $title);
            $builder->set("contents", $contents);
            $builder->set("file_idxs", $file_idxs);
            $builder->set("del_yn", "N");
            $builder->set("upd_id", $user_id);
            $builder->set("upd_date", $today);
            $builder->where("b_idx", $b_idx);
            $result = $builder->update();
            $db->transComplete();
        } catch (Throwable $t) {
            $result = false;
            $message = "입력에 오류가 발생했습니다.";
            logMessage($t->getMessage());
        }

        $model_result = array();
        $model_result["result"] = $result;
        $model_result["message"] = $message;

        return $model_result;
    }

    // 게시판 삭제
    public function procBoardDelete($b_idx)
    {
        // 게시판 입력과 관련된 기본 정보
        $member_id = getUserSessionInfo("member_id");
        $today = date("YmdHis");

        $result = true;
        $message = "입력이 잘 되었습니다";

        try {
            $db = db_connect();
            $db->transStart();
            $builder = $db->table("mng_board");
            $builder->set("del_yn", "Y");
            $builder->set("upd_id", $member_id);
            $builder->set("upd_date", $today);
            $builder->where("b_idx", $b_idx);
            $result = $builder->update();
            $db->transComplete();
        } catch (Throwable $t) {
            $result = false;
            $message = "입력에 오류가 발생했습니다.";
            logMessage($t->getMessage());
        }

        $model_result = array();
        $model_result["result"] = $result;
        $model_result["message"] = $message;

        return $model_result;
    }

}
