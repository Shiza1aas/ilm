<div class="panel panel-success">
  <div class="panel-heading">Add A Question</div>
  <div class="panel-body">
    <form class="form-horizontal" method="POST" action="insert_question">
      <div class="form-group">
        <label for="question" class="col-sm-2 control-label">Question: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="question" placeholder="Question">
        </div>
      </div>
      <div class="form-group">
        <label for="option_a" class="col-sm-2 control-label">Option A: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="option_a" placeholder="Option A">
        </div>
      </div>
      <div class="form-group">
        <label for="option_b" class="col-sm-2 control-label">Option B: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="option_b" placeholder="Option B">
        </div>
      </div>
      <div class="form-group">
        <label for="option_c" class="col-sm-2 control-label">Option C: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="option_c" placeholder="Option C">
        </div>
      </div>
      <div class="form-group">
        <label for="option_d" class="col-sm-2 control-label">Option D: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="option_d" placeholder="Option D">
        </div>
      </div>
      <div class="form-group">
        <label for="answer" class="col-sm-2 control-label">Answer: </label>
        <div class="col-sm-10">
          <!-- <input type="number" class="form-control" name="answer" placeholder="Answer: (1 or 2 or 3 or 4) "> -->
          <div class="radio">
            <label>
              <input type="radio" name="answer" value="0" > A
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="answer" value="1" > B
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="answer" value="2" > C
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="answer" value="3" > D
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="level" class="col-sm-2 control-label">Level: </label>
        <div class="col-sm-10">
          <!-- <input type="number" class="form-control" id="level" placeholder="Answer: (1 or 2 or 3 or 4) "> -->
          <div class="radio">
            <label>
              <input type="radio" name="level" id="easy" value="0" checked> Easy
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="level" id="medium" value="1" > Medium
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="level" id="hard" value="2" > Hard
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Add Question</button>
        </div>
      </div>
    </form>
  </div>
</div>
