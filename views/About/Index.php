<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": About");
	$o_db = new Db();
    $qr_objects = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0');
    $qr_objects->nextRow(); // the result has only 1 row.
    $vn_count = $qr_objects->get('c'); // this should be your count

    $qr_cost = $o_db->query('SELECT SUM(value_decimal1) AS cost FROM ca_attribute_values WHERE element_id=61');
	$qr_cost->nextRow();
	$vn_cost = $qr_cost->get('cost');
?>

<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">About</li>
</ul>

<h1 class="page-header">About iToysoldiers.com
    <small>'cause it's possible the content isn't a dead giveaway</small>
</h1>
<hr class="mb-4" />

<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="bg-white bg-opacity-25 p-5 rounded-3">
            <h1 class="display-4">I'm a Dark Eldar Snob</h1>
            <p class="lead">
                I also have anger management issues so I play World Eaters too!
            </p>
        </div>
    </div>
    <div class="col-lg-6 mb-3">
        <p class="fs-5">
        iToysoldiers has gone through some radical revamps since the concept of the site settled into my brain in the early 2000s. It was inspired by a local tournament 40K tournament in New Hampshire that recorded game results and provided an array of stats to participants in their events over time. I thought the idea was brilliant, so I started playing around with a similar idea. Time ticked away and I never really got very far with that idea.
        </p>
        <p class="fs-5">
        As a member of DorkaMorka, I tried to leverage the idea into a league/bracket tracker for the group. It wasn’t a good fit ‘cause we were largely narrative players and stats wasn’t a thing so I let it die (and unfortunately, due to a number of things – my relationship with those guys who were great and did not deserve a friend like me.  Ha!)
        </p>
        <p class="fs-5">
        Fast forward to 2010. I had just moved to Ontario, and I was looking for a group of like-minded Warhammer 40K enthusiasts. Luckily, I found one and started playing games arranged through their forum. Alas, there was a bit of a WarMachine/Hordes vs. WH40K schism. The forum shut down unexpectedly, so I jumped at the chance to craft a site for miniature wargaming enthusiasts. This was the first real iteration of iToysoldiers. It was awesome. It had everything: blogs, miniature lists, league management, forums, private messaging, stats, achievements. The works. For a couple of years iToysoldiers was the hub of the Windsor miniature wargaming community and there was even a small contingent from other parts of the world. I was VERY proud. Pride goeth before the fall.
        </p>
        <p class="fs-5">
        It was a beast to maintain, and it was expensive ‘cause the Drupal backend I was running didn’t handle custom stuff very efficiently. There was just an insane number of modules and custom code that it kind of outgrew itself. It also didn’t help that it tried to do everything. Too much. It was too hard to use, and I don’t think it was really clear what it was supposed to be. Alas, I was laid off from my ridiculously high paying job and couldn’t maintain it financially. Which was fine because I was also out of a job and bummed and couldn’t be bothered to be part of the Warhammer community. So ended the golden age of iToysoldiers.
        </p>
        <p class="fs-5">
        Over the next couple of years, I kept the iToysoldiers domain and knew I wanted to do something with it. I knew I wanted to catalog my collection, ‘cause I love stats, and I wanted to make it into a site/app/whatever. I’ve played with a lot of possible solutions – going back and forth between SASS solutions, custom apps using AWS Amplify and hard-core collection management software. I even played with various iPhone apps to organize my collection just for me. But I never really found what I wanted. Which leads us to this iteration of iToysoldiers that you’re looking at right this second.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 mb-3">
        <div class='card'>
            <div class='card-header fw-bold small bg-white bg-opacity-15'>iToysoldiers Today</div>
            <div class='card-body'>
                <p class="fs-5">
                    It doesn’t shock anyone who knows me that I opted for the hard-core collection management software. iToysoldiers is running Collective Access version 2.0 on Ubuntu 24.04. Because I’m a masochist, the theme is a custom one I created based off the HUD Admin template available on Wrapbootstrap. I would link to it, but it’s not available to purchase anymore so… 
                </p>
                <p class="fs-5">
                    I picked Collective Access because it is the most flexible of the open-source solutions that provide an externally facing website module. When I say flexible what I mean to say is a ridiculously complex data model that allows for customization of all elements of the system. So. I’m not a museum. I’m not displaying an archive of academic work. But Collective Access lets me massage their system to work for me. I’m extremely happy with my choice and I can’t wait to see my collection gradually become codified and defined.		
                </p>
            </div>
            <div class='card-arrow'>
                <div class='card-arrow-top-left'></div>
                <div class='card-arrow-top-right'></div>
                <div class='card-arrow-bottom-left'></div>
                <div class='card-arrow-bottom-right'></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class='card mb-3'>
            <div class='card-header fw-bold small bg-white bg-opacity-15'>FOUNDED</div>
            <div class='card-body'>
                <h5 class="card-title">2024</h5>
                When this iteration of iTS started
            </div>
            <div class='card-arrow'>
                <div class='card-arrow-top-left'></div>
                <div class='card-arrow-top-right'></div>
                <div class='card-arrow-bottom-left'></div>
                <div class='card-arrow-bottom-right'></div>
            </div>
        </div>

        <div class='card mb-3'>
            <div class='card-header fw-bold small bg-white bg-opacity-15'>COLLECTION</div>
            <div class='card-body'>
                <h5 class="card-title"><?php print $vn_count; ?></h5>
                Items in my collection
            </div>
            <div class='card-arrow'>
                <div class='card-arrow-top-left'></div>
                <div class='card-arrow-top-right'></div>
                <div class='card-arrow-bottom-left'></div>
                <div class='card-arrow-bottom-right'></div>
            </div>
        </div>

        <div class='card mb-3'>
            <div class='card-header fw-bold small bg-white bg-opacity-15'>COST</div>
            <div class='card-body'>
                <h5 class="card-title">$<?php print number_format((float)$vn_cost, 2, '.', ','); ?></h5>
                An estimate on what I've spend on my collection
            </div>
            <div class='card-arrow'>
                <div class='card-arrow-top-left'></div>
                <div class='card-arrow-top-right'></div>
                <div class='card-arrow-bottom-left'></div>
                <div class='card-arrow-bottom-right'></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-5 mb-3">
        <h2 class="fs-10 fw-bolder mb-3">
            Development History
        </h2>
        <p class="fs-5">
            Surprise! I’ve introduced version numbers into this project. Here's a list of milestones that have been introduced to the site since it’s inception. Note: I’m starting this iteration as v1 because I don’t dwell in the past (in other words, I ditch old code and can’t be bothered to remember the number I was on with the last version of the site.
        </p>
        <button class="btn me-1 mb-1 bg-dark px-4 fs-5 " data-bs-toggle="modal" data-bs-target="#bs-example-modal-md">
            Notes on Version Numbers
        </button>
        
        <div id="bs-example-modal-md" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="myModalLabel">
                            Notes on Version Numbers
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <dl class="row">
                            <dt class="col-sm-3">First Value</dt>
                            <dd class="col-sm-9">The first number is the major version. Unless I totally move away from Collective Access or change the major version of Collective Access this will stay at 1.</dd>
                            <dt class="col-sm-3">Second Value</dt>
                            <dd class="col-sm-9">The second number is the minor version. This will be incremented when I add a new feature. For example, the next thing I’m going to work on is the concept of workflow. When that’s ready it’ll be version 1.1.0.</dd>
                            <dt class="col-sm-3">Third Value</dt>
                            <dd class="col-sm-9">
                                The last number is the commit/build number. This isn’t compiled software and I’m just messing with the theme and the data model so any commit will increment this value. That includes changes to this about page when I chronicle new features. There will be jumps in this value because I’m not listing all the steps between starting a thing and the production release. H! Of course, I am. But not here. I’m using the project functionality in Git Hub to track the minutia. 
                            </dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger-subtle text-danger  waves-effect" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-6">
        <div class="border p-7 p-md-5 rounded-3">
            <h3 class="fs-7 fw-semibold mb-3">Change Log</h3>
            <div class="owl-carousel testimonial-carousel owl-theme">
                <!-- Put new version block here -->
                <div class="item">
                    <div class='card mb-3'>
                        <div class='card-header fw-bold small bg-white bg-opacity-15'>2024-12-10: 1.2.??</div>
                        <div class='card-body'>
                            <h5 class="card-title">Workflow</h5>
                            I've implemented workflow features so I can create and display a running activity log and muster state of models.
                        </div>
                        <div class='card-arrow'>
                            <div class='card-arrow-top-left'></div>
                            <div class='card-arrow-top-right'></div>
                            <div class='card-arrow-bottom-left'></div>
                            <div class='card-arrow-bottom-right'></div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class='card mb-3'>
                        <div class='card-header fw-bold small bg-white bg-opacity-15'>2024-11-27: 1.1.53</div>
                        <div class='card-body'>
                            <h5 class="card-title">Mobile Fixes</h5>
                            There were a few minor display issues on mobile devices. Fixed!
                        </div>
                        <div class='card-arrow'>
                            <div class='card-arrow-top-left'></div>
                            <div class='card-arrow-top-right'></div>
                            <div class='card-arrow-bottom-left'></div>
                            <div class='card-arrow-bottom-right'></div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class='card mb-3'>
                        <div class='card-header fw-bold small bg-white bg-opacity-15'>2024-11-26: 1.1.51</div>
                        <div class='card-body'>
                            <h5 class="card-title">New Themey Theme</h5>
                            The HUD admin based theme is online and working. I'm sure there will be refinements, but it's looking pretty snazzy.
                        </div>
                        <div class='card-arrow'>
                            <div class='card-arrow-top-left'></div>
                            <div class='card-arrow-top-right'></div>
                            <div class='card-arrow-bottom-left'></div>
                            <div class='card-arrow-bottom-right'></div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class='card mb-3'>
                        <div class='card-header fw-bold small bg-white bg-opacity-15'>2024-11-08: 1.0.29</div>
                        <div class='card-body'>
                            <h5 class="card-title">Minimal Viable Product</h5>
                            The software is working, and the theme is in a usable state. I can record my collection and I’m happy to let people look at the site. I’m okay with it being public.
                        </div>
                        <div class='card-arrow'>
                            <div class='card-arrow-top-left'></div>
                            <div class='card-arrow-top-right'></div>
                            <div class='card-arrow-bottom-left'></div>
                            <div class='card-arrow-bottom-right'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
