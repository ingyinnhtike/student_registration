<div class="card mb-3 col-md-3 m-2 p-1">

    <div class="card-body">
        <h3 class="card-title">ကျောင်းနေရန် အထောက်အပံ့ပြုမည့် ပုဂ္ဂိုလ်</h3>
        <div class="card-body">
            <p class="card-text"> <span class="title">Name: </span> {{$supporter->name??''}}</p>
            <p class="card-text"><span class="title">Relation To Student: </span> {{$supporter->relation_to_user??''}}</p>
            <p class="card-text"> <span class="title">Work: </span> {{$supporter->work??''}}</p>
            <p class="card-text"> <span class="title">Address: </span> {{$supporter->address??''}}</p>
            <p class="card-text"> <span class="title">Phone: </span> {{$supporter->phone??''}}</p>
            <hr/>
        </div>


    </div>
</div>
