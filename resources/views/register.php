<?php $this->layout('layouts/base', ['title' => $this->e($title)]); ?>

<main class="container d-md-flex" style="background-color: lightpink;">
    <!--
    <aside style="background-color: lightblue;">
        #Sidebar
    </aside>
    -->
    <div class="flex-grow-1" style="background-color: lightgrey;">
        <h1>User Registration</h1>
        <form>
            <div class="form-group col-md-6 offset-md-3">
                <label for="inputUsername">Username:</label>
                <input type="text" id="inputUsername" class="form-control" placeholder="eg: VAsya">
            </div>
        </form>
    </div>
</main>

