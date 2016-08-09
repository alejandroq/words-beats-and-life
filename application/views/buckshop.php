<div class="container" ng-controller="TableController">

  <div class="row"><h3>Items</h3></div>

  <div class="row">

    <div class="four columns block">
          <img src="img/boombox.png" alt="Boom Box">
            <h4>Boom Box</h4>
            <p>Price: $150</p>
            <button ng-show="x==3">Trade Bucks</button>
            <button ng-show="x!=3">Donate towards this Item</button>
      </div>

    <div class="four columns block">
      <img src="img/camera.jpg" alt="Cameras">
      <div class="caption">
          <h4>Cameras</h4>
          <p>Price: $150</p>
          <button ng-show="x==3">Trade Bucks</button>
          <button ng-show="x!=3">Donate towards this Item</button>
      </div>
    </div>

    <div class="four columns block">
      <img src="img/ChessPieces.jpg" alt="Chess Pieces">
      <div class="caption">
          <h4>Chess Pieces</h4>
          <p>Price: $20</p>    
          <button ng-show="x==3">Trade Bucks</button>
          <button ng-show="x!=3">Donate towards this Item</button>  
      </div> 
    </div>
  </div><!--closing div for row-->


  <div class="row"><h3>Programs</h3></div>

  <div class="row">
    
    <div class="four columns block">
      <img src="img/dance.jpg" alt="dance program">
      <h4>Donate to the Dance Program</h4>  
      <button ng-show="x==3">Trade Bucks</button>
      <button ng-show="x!=3">Donate towards this Program</button>     
    </div>

    <div class="four columns block">
      <img src="img/chessgame.jpg" alt="A Game of Chess">
      <h4>Donate to the Chess Program</h4>
      <button ng-show="x==3">Trade Bucks</button>
      <button ng-show="x!=3">Donate towards this Program</button>       
    </div>

    <div class="four columns block">
      <img src="img/photo_program.jpg" alt="Photography Program">
      <h4>Donate to the Photography Program</h4>  
      <button ng-show="x==3">Trade Bucks</button>
      <button ng-show="x!=3">Donate towards this Program</button>     
    </div>
  </div><!--closing div for row-->

  <div class="row"><h3>Projects and Tours</h3></div>

  <div class="row">
    
    <div class="four columns block">
      <img src="img/citytour.jpg" alt="City Tour">
      <h4>Purchase Tickets for the City Tour</h4>
      <p>Donate today to help us raise $5,000 to rent a 12-passenger van for a monthly creative economy tour of the District of Columbia, for a week long rental for an Alternative Winter Break tour and Alternative Spring Break tour.</p>
      <button ng-show="x==3">Trade Bucks</button>
      <button ng-show="x!=3">Donate towards this Event</button> 
    </div>

    <div class="four columns block">
      <img src="img/muralproject1.jpg" alt="Mural Project #1">
      <h4>Donate to Mural Project I</h4>
      <p>“We want our mural to represent what we stand for as a house. We are men of different faiths, different backgrounds, different races, and different socioeconomic classes, but we all share a desire to make a positive difference in the world.” -Graham McLaughlin, Clean Decisions</p>   
      <button ng-show="x==3">Trade Bucks</button>
      <button ng-show="x!=3">Donate towards this Event</button>     
    </div>

    <div class="four columns block">
      <img src="img/muralproject2.jpg" alt="Mural Project #2">
      <h4>Donate to Mural Project II</h4>
      <p>“The DC Council voted to rename the 500 block of U Street, Lawrence Guyot Way in honor of my father’s contributions to the District, as well as his Civil Rights legacy.” -Julie Guyot, Daughter of Lawrence Guyot</p>  
      <button ng-show="x==3">Trade Bucks</button>
      <button ng-show="x!=3">Donate towards this Event</button> 
      </div>
  </div><!--closing div -->

</div>
