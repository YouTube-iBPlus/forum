   $(function () {

        randomQuotes();

        function randomQuotes() {

            var quotes = ["Politics is the art of looking for trouble, finding it everywhere, diagnosing it incorrectly, and applying the wrong remedies. #Groucho Marx",
                "Never memorize something that you can look up. #Albert Einstein",
                "Science without religion is lame, religion without science is blind. #Albert Einstein",
                "If we knew what it was we were doing, it would not be called research, would it? #Albert Einstein",


                "Who you are in the space where you can’t see in front of you is where courage is born. #Brené Brown",
                "If you have a spreadsheet but haven’t spread yourself on the ground to pray, you’ve missed the point. #Albert Tate",
                "Don’t go to work to work, go to work to be excellent in your career and to care about the people around you. #Horst Schulze",
                "If you’ve become accustomed to being a leader, take a break and let someone else take the lead. #Liz Wiseman",
                "The fastest way to change the feedback culture in an organization is for the leaders to become better receivers. #Sheila Heen",
                "So much of leadership is like walking on water, only God can keep you from sinking. #Brian Houston",
                "Live for what’s worth dying for. #Common",
                "Everyone really does win when a leader gets better. #Bill Hybels",
                "Step into that commitment. How bad you want something determines what you will do to get it. #Craig Groeschel",
                "If your character is not strengthening, your future potential is weakening. #Craig Groeschel",
                "A secure leader know how to laugh at themselves. #Michael Jr.",
                "Is it possible we are at our best when we know our very least – when we are rookies. #Liz Wiseman",
                "I think organizations don’t grow because leaders believe “our people can’t do what we do. #Sam Adeyemi",
                "The bravest among us will always be the most broken-hearted because we had the courage to love. #Brené Brown"
            ];



            var randomTxt = parseInt(Math.floor(Math.random() * quotes.length));

            var quoteAuthor = quotes[randomTxt].split('#');


            $('.qoutes').text(quoteAuthor[0]);
            $('.author').text(quoteAuthor[1]);
        }

        $(".button").on("click", function () {
            randomQuotes();
        });

    });