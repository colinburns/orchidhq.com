<div class="layout">
    <div class="container content">
        <div class="row">
            <div class="col-lg-12 typography" role="main">
                <div>
                    <h3>Flowering in {$MonthName}</h3>
                    <% loop $OrchidFloweringThisMonth %>
                    <div class="row" style="border:1px solid #efefef;margin-bottom:30px;padding-bottom:15px;padding-top:15px;">
                        <div class="col-lg-4 typography" role="main">
                            <img src="assets/orchid-photos/{$OrchidPhoto.FileName}" style="max-width:100%;" />
                        </div>
                        <div class="col-lg-8 typography" role="main">
                            <h4>Orchid Details</h4>
                            <ul style="padding:0;margin-left:15px;">
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Pot Number: </span> {$PotNumber}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Breed: </span> {$Breed}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Type: </span> {$Type}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Flower Colour: </span> {$FlowerColourDisplay}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Flowering Month: </span> {$FloweringMonthDisplay}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Notes: </span><br>{$Notes}</li>
                            </ul>
                        </div>
                    </div>
                    <% end_loop %>
                    <h3>Flowering in {$NextMonthName}</h3>
                    <% loop $OrchidFloweringNextMonth %>
                    <div class="row" style="border:1px solid #efefef;margin-bottom:30px;padding-bottom:15px;padding-top:15px;">
                        <div class="col-lg-4 typography" role="main">
                            <img src="assets/orchid-photos/{$OrchidPhoto.FileName}" style="max-width:100%;" />
                        </div>
                        <div class="col-lg-8 typography" role="main">
                            <h4>Orchid Details</h4>
                            <ul style="padding:0;margin-left:15px;">
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Pot Number: </span> {$PotNumber}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Breed: </span> {$Breed}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Type: </span> {$Type}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Flower Colour: </span> {$FlowerColourDisplay}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Flowering Month: </span> {$FloweringMonthDisplay}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Flowering Month: </span> {$FloweringMonthDisplay}</li>
                                <li><span style="display:inline-block;width:150px;font-weight:bold;">Notes: </span><br>{$Notes}</li>
                            </ul>
                        </div>
                    </div>
                    <% end_loop %>
                </div>
            </div>
        </div>
    </div>
</div>