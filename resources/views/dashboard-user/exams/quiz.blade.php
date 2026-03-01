@extends('layouts.board')

@section('content')

<style>
    body {
        background: #f3f4f6;
    }

    .course-container {
        max-width: 900px;
        margin: 30px auto;
    }

    .card-box {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.06);
        text-align: center;
    }

    .title {
        font-weight: 600;
        margin-bottom: 15px;
    }

    .exam-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .exam-table th {
        width: 33.33%;
        padding: 14px;
        text-align: center;
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        color: #fff;
    }

    .exam-table td {
        padding: 14px;
        text-align: center;
        background: #f9fafb;
    }

    .exam-table tr {
        border-bottom: 1px solid #e5e7eb;
    }

    .btn-start {
        display: block;
        margin: 20px auto;
        background: #16a34a;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
    }

    .btn-submit {
        margin-top: 20px;
        background: #ef4444;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: 600;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    #timer {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: #dc2626;
        margin-top: 10px;
    }
</style>

<div class="course-container">

    <!-- INFO -->
    <div class="card-box">
        <h4 class="title">📝 Bài thi</h4>

        <div id="minute" style="display:none">{{ $exam->total_time }}</div>

        <table class="exam-table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Exam</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $exam->course->name }}</td>
                    <td>{{ $exam->name }}</td>
                    <td>{{ $exam->total_time }} phút</td>
                </tr>
            </tbody>
        </table>

        <div id="timer">⏰ Đang tải...</div>
    </div>

    <!-- SELECT LEVEL -->
    <div class="card-box">
        <form id="formSelectLevel" data-id="{{ $exam->id }}">
            @csrf
            <label><b>Chọn level:</b></label>
            <select name="level" id="level" class="form-control">
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>

            <button type="submit" class="btn-start">🚀 Bắt đầu làm bài</button>
        </form>
    </div>

    <!-- QUIZ -->
    <div class="card-box">
        <form id="formQuiz" method="POST" action="{{ route('student.exam.quiz.check',$exam->id) }}" onsubmit="return checkSubmit()">
            @csrf
            <div id="questions"></div>
        </form>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // ===== FIX lỗi null =====
    let minuteEl = document.getElementById('minute');
    let totalTime = parseInt(minuteEl?.innerText || 0) * 60;

    let timeLeft = totalTime;
    let minSubmitTime = totalTime * (2/3);

    let startTime = 0;
    let warningCount = 0;
    let isLocked = false;
    let isStarted = false; 
    let timer; 

    // ===== BẮT ĐẦU LÀM BÀI =====
    document.getElementById("formSelectLevel").addEventListener("submit", function(e) {
        e.preventDefault();

        if (isStarted) return;

        isStarted = true;

        // 👉 ghi nhận thời gian bắt đầu
        startTime = Date.now();

        // 👉 ẩn form chọn level
        this.style.display = "none";

        // 👉 chạy timer
        startTimer();
    });

    // ===== TIMER =====
    function startTimer() {
        timer = setInterval(() => {

            let m = Math.floor(timeLeft / 60);
            let s = timeLeft % 60;

            document.getElementById("timer").innerHTML =
                "⏰ " + m + ":" + (s < 10 ? "0" : "") + s;

            timeLeft--;

            if (timeLeft < 0) {
                clearInterval(timer);
                alert("⏰ Hết giờ! Tự động nộp bài");
                document.getElementById("formQuiz").submit();
            }

        }, 1000);
    }

    // ===== CHẶN TAB =====
    document.addEventListener("visibilitychange", function () {
        if (!isStarted) return;

        if (document.hidden) {
            warningCount++;

            if (warningCount <= 2) {
                alert("⚠️ Không được chuyển tab!\nCòn " + (3 - warningCount) + " lần!");
            } else {
                alert("❌ Bạn đã bị khóa bài thi!");
                lockExam();
            }
        }
    });

    function lockExam() {
        isLocked = true;

        clearInterval(timer); // 👉 FIX

        document.querySelectorAll("input, button, select").forEach(el => {
            el.disabled = true;
        });

        document.body.innerHTML += "<h2 style='color:red;text-align:center'>❌ Bài thi đã bị khóa</h2>";
    }

    // ===== CHẶN NỘP SỚM =====
    window.checkSubmit = function () {
        let now = Date.now();
        let timePassed = (now - startTime) / 1000;

        if (!isStarted) {
            alert("❌ Bạn chưa bắt đầu làm bài!");
            return false;
        }

        if (isLocked) {
            alert("❌ Bài đã bị khóa!");
            return false;
        }

        if (timePassed < minSubmitTime) {
            let remain = Math.floor(minSubmitTime - timePassed);
            alert("⏳ Chưa đủ thời gian!\nCòn " + remain + " giây nữa!");
            return false;
        }

        return true;
    }

    // ===== CHẶN RELOAD =====
    window.onbeforeunload = function () {
        if (isStarted && !isLocked) {
            return "Bạn đang làm bài thi!";
        }
    };

});
</script>

@endsection