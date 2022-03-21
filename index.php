<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" ></script>
        <link href = "http///fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" >
        <link rel = "stylesheet" href="css/style.css">
        <script src = "js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>contactez-moi!</h2>
            </div>
            <div class ="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method="post" action="" role="form">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="firstname">Prénom<span class="blue"> *</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" >
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Nom<span class="blue"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom">
                                <p class="comments"></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email">
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-6">
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre Téléphone" >
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-12">
                                <label for="subject">Sujet<span class="blue"> *</span></label>
                                <select class="form-control" name="subject" id="subject">
                                    <option value="">Quel est le sujet de votre message?</option>
                                    <option value="Je voudrais plus des informations sur vos services">Je voudrais plus des informations sur vos services</option>
                                    <option value="J'aimerais recevoir un devis">J'aimerais recevoir un devis</option>
                                    <option value="Autre message du site">Autre</option>                                
                                </select>
                                <p class="comments"></p>

                            </div>
                            
                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4" ></textarea>
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-12">
                                <p class="blue"><strong> * Ces informations sont requises</strong></p>
                            </div>

                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>

                        </div>
                        
                    </form>
                </div>
            </div>

            
        </div>

        
    </body>

</html>