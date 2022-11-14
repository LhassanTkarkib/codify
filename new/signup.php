<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">
    <title>Document</title>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
            <div class="col-lg-5 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                    <img class="covid-image" src="logo.png">
                    <h2>Codify</h2>
                    <h3>Plateforme de Freelance</h3>
                    <div style="font-size:30px ;">Inscrivez-vous pour continuer</div>
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                </div>
              
                <div id="qbox-container">
                    <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
                    <h1 class="title">S'inscrire </h1>
                        <div id="steps-container">
                            <div class="step">
                                <br> <br> <br> <br>
                                <h4>Veuillez selectionner votre type d'utilisateur</h4>
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                        <input class="form-check-input question__input" id="free" name="q_1" type="radio" value="Freelancer"> 
                                        <label class="form-check-label question__label" for="free">Freelancer</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="cli" name="q_1" type="radio" value="Client / Employeur"> 
                                        <label class="form-check-label question__label" for="cli">Client / Employeur </label>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                               <br> <br>
                                <div class="mt-1">
                                    <label class="form-label">Nom Complet :</label> 
                                    <input class="form-control" id="full_name" name="full_name" type="text">
                                </div>
                                
                                <div class="mt-2">
                                    <label class="form-label">Adresse E-mail:</label> 
                                    <input class="form-control" id="email" name="email" type="email">
                                </div>
                            
                                <div class="mt-2">
                                    <label class="form-label">Mot de Passe :</label> 
                                    <input class="form-control" id="address" name="address" type="password" style="width: 100%">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Confirmation du Mot de Passe :</label> 
                                    <input class="form-control" id="address" name="address" type="password" style="width: 100%">
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2 col-md-2 col-3">
                                        
                                    </div>
                                    <div class="col-lg-8">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="step">
                                <div id="freelancer">
                                <h4>Freelancer</h4>
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                         <input class="form-check-input question__input" id="q_2_yes" name="q_2" type="radio" value="Yes"> 
                                        <label class="form-check-label question__label" for="q_2_yes">Yes</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="q_2_no" name="q_2" type="radio" value="No"> 
                                        <label class="form-check-label question__label" for="q_2_no">No</label> 
                                    <label for="">Domaine d'expértise:</label> <br>
                                    <select name="domaine" id="">
                                        <option value="">Développement Web</option>
                                        <option value="">Développement Mobile</option>
                                        <option value="">SEO et marketing</option>
                                        <option value="">Design Graphique</option>
                                        <option value="">Filmmaking</option>
                                    </select> <br> <br>
                                    <label for="">CV</label> <br>
                                    <input type="file" name="cv" id=""> <br> <br>
                                    <label for="">CIN</label> <br>
                                    <input type="file" name="cin" id="">
                                    </div>
                                </div>
                                </div>
                                <div id="client" style=""> 
                                <h4>Client</h4>
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                    <label class="" for="profileimage">Photo d'identité</label> <br>
                                        <input class="" id="profileimage" name="image" type="file"> 
                                        
                                    </div> <br> <br>
                                    <div class="q-box__question">
                                         <label class="" for="sec">Secteur d'activité :</label> <br>
                                        <input  class="" id="sec" name="sec" type="text"> 
                                        
                                    </div> <br> <br>
                                    <div class="q-box__question">
                                         <label class="" for="sec">Service ciblé :</label> <br>
                                        <input  class="" id="serv" name="serv" type="text"> 
                                        
                                    </div>
                                </div>
                                </div>
                            </div> -->
                           
                           
                            <div class="step">
                            <div id="freelancer">
                                
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                        <!-- <input class="form-check-input question__input" id="q_2_yes" name="q_2" type="radio" value="Yes"> 
                                        <label class="form-check-label question__label" for="q_2_yes">Yes</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="q_2_no" name="q_2" type="radio" value="No"> 
                                        <label class="form-check-label question__label" for="q_2_no">No</label> -->
                                    <br><br> <br><label for="">Domaine d'expértise:</label> <br>
                                    <select name="domaine" id="">
                                        <option value="">Développement Web</option>
                                        <option value="">Développement Mobile</option>
                                        <option value="">SEO et marketing</option>
                                        <option value="">Design Graphique</option>
                                        <option value="">Filmmaking</option>
                                    </select> <br> <br> <br>
                                    <label for="">CV</label> <br>
                                    <input type="file" name="cv" id=""> <br> <br> <br>
                                    <label for="">CIN</label> <br>
                                    <input type="file" name="cin" id=""> <br> <br>
                                    </div>
                                </div>
                                </div>
                                <div id="client" style=""> 
                                
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                    <br><br> <br>
                                    <label class="" for="profileimage">Photo d'identité</label> <br>
                                        <input class="" id="profileimage" name="image" type="file"> 
                                        
                                    </div> <br> <br>
                                    <div class="q-box__question">
                                         <label class="" for="sec">Secteur d'activité :</label> <br>
                                        <input  class="" id="sec" name="sec" type="text"> 
                                        
                                    </div> <br> <br>
                                    <div class="q-box__question">
                                         <label class="" for="sec">Service ciblé :</label> <br>
                                        <input  class="" id="serv" name="serv" type="text"> 
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div id="success">
                                <div class="mt-5">
                                    <h4>Success! We'll get back to you ASAP!</h4>
                                    <p>Meanwhile, clean your hands often, use soap and water, or an alcohol-based hand rub, maintain a safe distance from anyone who is coughing or sneezing and always wear a mask when physical distancing is not possible.</p>
                                    <a class="back-link" href="">Go back from the beginning ➜</a>
                                </div>
                            </div>
                        </div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button">Previous</button> 
                            <button id="next-btn" type="button" onclick="idk()">Suivant</button> 
                            <button id="submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
    <script>
        function idk()
        {var free = document.getElementById('free');
        var client=document.getElementById('cli');
        if(free.checked){
                document.getElementById('freelancer').style.display="block";
                document.getElementById('client').style.display="none";
                document.getElementById('idcli').style.display="none";
                document.getElementById('idfree').style.display="block"
        }
        else if(client.checked){
            document.getElementById('freelancer').style.display="none";
            document.getElementById('client').style.display="block";
            document.getElementById('idcli').style.display="block";
            document.getElementById('idfree').style.display="none"
        }}
    </script>
    <script src="signup.js"></script>
</body>
</html>