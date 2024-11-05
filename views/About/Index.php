<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": About");
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<h1 class="page-header">About iToysoldiers
						<small>Because the content isn't clear enough</small>
					</h1>
					<hr class="mb-4" />
					<div id="topWidget" class="mb-3">
						<div class="bg-white bg-opacity-25 p-5 rounded-3 mb-3">
  							<h1 class="display-4">I'm a Dark Eldar Snob</h1>
  							<p class="lead">But I also have anger management issues so I play World Eaters too.</p>
						</div>
						<p>
						I am a huge dork. I love cataloging stuff. I love stats. My miniature wargaming collection is in dire needs of this treatment. Thus, I present you: iToysoldiers.com, the canonical archive of my miniature wargaming collection. Models. Books. Prints. All things.
						</p>
					</div>

					<div id="historyWidget" class="mb-3">
						<h2>History of iToysoldiers</h2>
						<p>
							iToysoldiers has gone through some radical revamps since the concept of the site settled into my brain in the early 2000s. It was inspired by a local tournament 40K tournament in New Hampshire that recorded game results and provided an array of stats to participants in their events over time. I thought the idea was brilliant, so I started playing around with a similar idea. Time ticked away and I never really got very far with that idea.
						</p>
						<p>
							As a member of DorkaMorka, I tried to leverage the idea into a league/bracket tracker for the group. It wasn’t a good fit ‘cause we were largely narrative players and stats wasn’t a thing so I let it die (and unfortunately, due to a number of things – my relationship with those guys who were great and did not deserve a friend like me.  Ha!)
						</p>
						<p>
							Fast forward to 2010. I had just moved to Ontario, and I was looking for a group of like-minded Warhammer 40K enthusiasts. Luckily, I found one and started playing games arranged through their forum. Alas, there was a bit of a WarMachine/Hordes vs. WH40K schism. The forum shut down unexpectedly, so I jumped at the chance to craft a site for miniature wargaming enthusiasts. This was the first real iteration of iToysoldiers. It was awesome. It had everything: blogs, miniature lists, league management, forums, private messaging, stats, achievements. The works. For a couple of years iToysoldiers was the hub of the Windsor miniature wargaming community and there was even a small contingent from other parts of the world. I was VERY proud. Pride goeth before the fall.
						</p>
						<p>
							It was a beast to maintain, and it was expensive ‘cause the Drupal backend I was running didn’t handle custom stuff very efficiently. There was just an insane number of modules and custom code that it kind of outgrew itself. It also didn’t help that it tried to do everything. Too much. It was too hard to use, and I don’t think it was really clear what it was supposed to be. Alas, I was laid off from my ridiculously high paying job and couldn’t maintain it financially. Which was fine because I was also out of a job and bummed and couldn’t be bothered to be part of the Warhammer community. So ended the golden age of iToysoldiers.
						</p>
						<p>
							Over the next couple of years, I kept the iToysoldiers domain and knew I wanted to do something with it. I knew I wanted to catalog my collection, ‘cause I love stats, and I wanted to make it into a site/app/whatever. I’ve played with a lot of possible solutions – going back and forth between SASS solutions, custom apps using AWS Amplify and hard-core collection management software. I even played with various iPhone apps to organize my collection just for me. But I never really found what I wanted. Which leads us to this iteration of iToysoldiers that you’re looking at right this second.
						</p>

					</div>

					<div id="todayWidget" class="mb-3">
						<h2>iToysoldiers Today</h2>
						<p>
						It doesn’t shock anyone who knows me that I opted for the hard-core collection management software. iToysoldiers is running Collective Access version 1.7.17 on Ubuntu 22.04. Because I’m a masochist, the theme is a custom one I created based off the HUD Admin template available on Wrapbootstrap. I would link to it, but it’s not available to purchase anymore so… I picked Collective Access because it is the most flexible of the open-source solutions that provide an externally facing website module. When I say flexible what I mean to say is a ridiculously complex data model that allows for customization of all elements of the system. So. I’m not a museum. I’m not displaying an archive of academic work. But Collective Access lets me massage their system to work for me. I’m extremely happy with my choice and I can’t wait to see my collection gradually become codified and defined.
						</p>
					</div>

					<div id="changeWidget" class="mb-3">
						<h2>Change Log</h2>
						<p>
							Are you shocked that I’ve introduced version numbers into this project? Of course you’re not. Below is a list of milestones that have been introduced to the site since it’s inception. Note: I’m starting this iteration as v1 because I don’t dwell in the past (in other words, I ditch old code and can’t be bothered to remember the number I was on with the last version of the site.
						</p>
						<p>
							A note on version numbers.
						</p>
						<dl class="row">
							<dt class="col-sm-3">First Value</dt>
							<dd class="col-sm-9">The first number is the major version. Unless I totally move away from Collective Access or change the major version of Collective Access this will stay at 1.</dd>
							<dt class="col-sm-3">Second Value</dt>
							<dd class="col-sm-9">The second number is the minor version. This will be incremented when I add a new feature. For example, the next thing I’m going to work on is the concept of workflow. When that’s ready it’ll be version 1.1.0.
							</dd>
							<dt class="col-sm-3">Third Value</dt>
							<dd class="col-sm-9">
							The last number is the commit/build number. This isn’t compiled software and I’m just messing with the theme and the data model so any commit will increment this value. That includes changes to this about page when I chronicle new features. There will be jumps in this value because I’m not listing all the steps between starting a thing and the production release. H! Of course, I am. But not here. I’m using the project functionality in Git Hub to track the minutia. 
							</dd>
						</dl>

						<div class="card mb-3">
							<div class="card-header fw-bold small">1.0.?</div>
							<div class="card-body">
								<h5 class="card-title">Minimal Viable Product</h5>
								<h6 class="card-subtitle mb-3 text-white text-opacity-50">It Works!</h6>
								<p class="card-text mb-3">
									The software is working, and the theme is in a usable state. I can record my collection and I’m happy to let people look at the site. I’m okay with it being public.
								</p>
							</div>
							<div class="card-arrow">
								<div class="card-arrow-top-left"></div>
								<div class="card-arrow-top-right"></div>
								<div class="card-arrow-bottom-left"></div>
								<div class="card-arrow-bottom-right"></div>
							</div>
						</div>


					</div>

				</div>
				<div class="col-xl-3">
					<!-- BEGIN #sidebar -->
					<nav class="navbar navbar-sticky d-none d-xl-block">
						<nav class="nav">
							<a class="nav-link" href="#topWidget" data-toggle="scroll-to">Top</a>
							<a class="nav-link" href="#historyWidget" data-toggle="scroll-to">History of iToysoldiers</a>
							<a class="nav-link" href="#todayWidget" data-toggle="scroll-to">iToysoldiers Today</a>
							<a class="nav-link" href="#changeWidget" data-toggle="scroll-to">Change Log</a>
						</nav>
					</nav>
					<!-- END #sidebar -->

				</div>
			</div>
		</div>
	</div>
</div>