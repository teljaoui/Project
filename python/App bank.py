import csv

client={}
compte={}
clientCompte={}


def ajouterclient(numci,MPC,numC,soldeC):
    client[numci]=MPC
    compte[numC]=soldeC
    clientCompte[numC]=numci
ajouterclient(1,"523A",56,3000)
ajouterclient(2,"433B",29,9000)
print(client)
print(compte)
print(clientCompte)


def supprimerCompte(numC):

    for values in clientCompte.values():
        if values==clientCompte[numC] :
            client.pop(values)
    compte.pop(numC)
    clientCompte.pop(numC)

supprimerCompte(56)
print(client)
print(compte)
print(clientCompte)


def modifierMPC(numci,MPC,NMPC):
    for i in client:
        if MPC==client[numci]:
            client[numci]=NMPC

modifierMPC(2,"433B","456B")
print(client)



def deposer(numC,deposit):
    compte[numC]+=deposit

deposer(29,300)
print(compte)



def retirer(numC,retirer):
    compte[numC]-=retirer

retirer(29,3000)
print(compte)



def genererNumCompte(numci,j):
    a=numci*100
    print("Le numéro de compte est",a+j)

genererNumCompte(25,79)



def EcrireFichierCSV(numC,MPC):
    j=open("fichiercsv.csv","w")
    addcsv=csv.writer(j,delimiter=";")
    addcsv.writerow(["Num Compte","Mot de pass"])
    addcsv.writerow([numC,MPC])
    j.close()
    read=open("fichiercsv.csv","r")
    readcsv=csv.reader(read,delimiter=";")
    for ligne in readcsv:
        print(ligne)
    read.close()

EcrireFichierCSV(29,"456B")



def menuchoixagent():
    a=int(input('''Bonjour !
    Les options disponibles pour un agent sont :
    1-- Ajouter un client
    2-- Supprimer un Compte
    Quelle option voulez vous executer ?'''))
    if a==1:
        numci=int(input("Entrez le numéro du client: "))
        MPC=int(input("Entrez le mot de passe du client: "))
        numC=int(input("Entrez le numére du compte: "))
        soldeC=int(input("Entrez le solde du client"))
        ajouterclient(numci,MPC,numC,soldeC)
    if a==2:
        numC=int(input("Entrez le numéro du compte que vous voulez supprimer: "))
        supprimerCompte(numC)



def menuchoixclient():
    a=int(input('''Bonjour cher client !
    Les options disponibles pour vous sont :
    1--Modifier votre mot de passe
    2--Deposer de l'argent
    3--Retirer de l'argent'''))
    if a==1:
        numci=int(input("Entrez votre numéro: "))
        MPC=int(input("Entrez le mot de passe: "))
        NMPC=int(input("Entrez le nouveau mot de passe: "))
        modifierMPC(numci,MPC,NMPC)
    if a==2:
        numC=int(input("Entrez le numéro de compte: "))
        deposit=int(input("Entrez la somme que vous voulez deposer: "))
        deposer(numC,deposit)
    if a==3:
        numC=int(input("Entrez le numéro de compte: "))
        retirerA=int(input("Entrez la somme que vous voulez retirer"))
        retirer(numC,retirerA)


