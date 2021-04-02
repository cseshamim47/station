#include<bits/stdc++.h>
using namespace std;

struct mathspell
{
    char numspell[10];
    struct mathspell *mnext;

}*mathhead=NULL;

struct englishwords
{
    char word[20];
    struct englishwords *enext;
}*englishhead=NULL;

string poems[10];
string abtc[20];
string examset[10];
string questions1[20];
string questions2[20];
string questions3[20];
string questions4[20];
string questions5[20];
int ansstore1[16]={0,1,1,1,1,2,2,2,1,1,1,1,1,1,1,2};
int ansstore2[16]={0,2,1,2,1,1,1,1,2,2,1,2,1,2,2,1};
int ansstore3[16]={0,1,1,1,1,2,1,1,2,1,1,1,1,2,2,1};
int ansstore4[16]={0,2,1,1,1,2,1,2,1,1,1,2,1,2,1,2};
int ansstore5[16]={0,2,2,1,2,1,1,1,2,2,1,1,2,2,1,2};

struct GK
{
    char countryname[50];
    char capitals[50];
    char coins[50];
    struct GK *gknext;
}*GKhead=NULL;;

void mathstore()
{
    struct mathspell *current,*newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"One");
    mathhead=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Two");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Three");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Four");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Five");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Six");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Seven");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Eight");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Nine");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Ten");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Eleven");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Twelve");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Thirteen");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Fourteen");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Fifteen");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Sixteen");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Seventeen");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Eighteen");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Nineteen");
    current->mnext=newnode;
    current=newnode;
    newnode=(struct mathspell*)malloc(sizeof (struct mathspell));
    newnode->mnext=NULL;
    strcpy(newnode->numspell,"Twenty");
    current->mnext=newnode;
    current=newnode;
    return;
}

void englishstore()
{
    struct englishwords *current,*newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Apple");
    current=newnode;
    englishhead=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Ball");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Cat");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Doll");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Elephant");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Frog");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Goat");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Hat");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Ink");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Jar");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Kite");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Light");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Moon");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Night");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Owl");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Parrot");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Queen");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Rat");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Sun");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Table");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Umbrella");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Violin");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Wolf");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"X-ray");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Yo-Yo");
    current->enext=newnode;
    current=newnode;
    newnode=(struct englishwords*)malloc(sizeof (struct englishwords));
    newnode->enext=NULL;
    strcpy(newnode->word,"Zoo");
    current->enext=newnode;
    current=newnode;
    poems[0]="0";
    poems[1]="\nTwinkle, Twinkle, Little Star\n\nTwinkle, twinkle, little star,\nHow I wonder what you are!\nUp above the world so high,\nLike a diamond in the sky.\n\n";
    poems[2]="\nBaa, baa, black sheep\n\nBaa, baa, black sheep,\nHave you any wool?\nYes, sir, yes, sir,\nThree bags full;\nOne for the master,\nAnd one for the dame,\nAnd one for the little boy\nWho lives down the lane.\n\n";
    poems[3]="\nHumpty Dumpty\n\nHumpty Dumpty sat on a wall,\nHumpty Dumpty had a great fall.\nAll the king's\nhorses and all the king's men\nCouldn't put Humpty together again\n\n";
    poems[4]="\nEarly to bed\n\nEarly to bed and early to rise,\nMakes a man healthy and wealthy and wise.\n\n";
    poems[5]="\nTwo little black birds\n\nTwo little black birds sitting on a wall\nOne named Peter, one named Paul.\nFly away Peter! Fly away Paul!\nCome back Peter! Come back Paul!\n\n";
    poems[6]="\nJohny, Johny\n\nJohny, Johny,\nYes papa?\nEating sugar?\nNo papa.\nTelling lies?\nNo papa.\nOpen wide.\nHa ha ha!\n\n";
    poems[7]="\nRain, rain, go away\n\nRain, rain, go away\nCome again another day\nLittle Arthur wants to play.\n\n";
    return;
}

void gkstore()
{
    struct GK *current,*newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"Bangladesh");
    strcpy(newnode->capitals,"Dhaka");
    strcpy(newnode->coins,"Taka");
    GKhead=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"India");
    strcpy(newnode->capitals,"New Delhi");
    strcpy(newnode->coins,"Rupee");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"Pakistan");
    strcpy(newnode->capitals,"Islamabad");
    strcpy(newnode->coins,"Rupee");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"Nepal");
    strcpy(newnode->capitals,"Kathmandu");
    strcpy(newnode->coins,"Nepalese rupee");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"Bhutan");
    strcpy(newnode->capitals,"Thimphu");
    strcpy(newnode->coins,"Ngultrum");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"Maldives");
    strcpy(newnode->capitals,"Male");
    strcpy(newnode->coins,"Rufiyaa");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"United Kingdom");
    strcpy(newnode->capitals,"London");
    strcpy(newnode->coins,"Pound");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"United States of America");
    strcpy(newnode->capitals,"Washington, D.C.");
    strcpy(newnode->coins,"Dollar");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"Australia");
    strcpy(newnode->capitals,"Canberra");
    strcpy(newnode->coins,"Dollar");
    current->gknext=newnode;
    current=newnode;
    newnode=(struct GK*)malloc(sizeof (struct GK));
    newnode->gknext=NULL;
    strcpy(newnode->countryname,"Canada");
    strcpy(newnode->capitals,"Ottawa");
    strcpy(newnode->coins,"Dollar");
    current->gknext=newnode;
    current=newnode;
    abtc[0]="The Name of Our Coutry: Bangladesh.";
    abtc[1]="The Independence Day of Our Coutry: 26th, March.";
    abtc[2]="The Victory Day of Our Coutry: 16th, December.";
    abtc[3]="The International mother language Day: 21st, February.";
    abtc[4]="The Color of Our National flag: Red and Green.";
    abtc[5]="The National Song of Our Coutry: Amar Shonar Bangla.";
    abtc[6]="The National animal of Our Coutry: Royal Bengal Tiger.";
    abtc[7]="The National Bird of Our Coutry: Magpie Robin.";
    abtc[8]="The National Flower of Our Coutry: Water Lily.";
    abtc[9]="The National Fruit of Our Coutry: Jack Fruit.";
    abtc[10]="The National Sport of Our Coutry: Ha-Du-Du.";
    abtc[11]="The National Poet of Our Coutry: Kazi Nazrul Islam.";
    abtc[12]="The National tree of Our Coutry: Mango Tree.";
    abtc[13]="The Number of Divisions of Our Coutry: Nine.";
    abtc[14]="The Number of Districts of Our Coutry: 64.";
    abtc[15]="The Area of Our Coutry: 147,570 kmsquare.";

    return;

}

void xmstore()
{
    questions1[1]="\n\"Up above the world so high\",what is the next line?\n1. Like a diamond in the sky.\n2. How I wonder what you are!\n";
    questions1[2]="\n\"Have you any wool?\",what is the previous line?\n1. Baa, baa, black sheep,\n2. Yes, sir, yes, sir,\n";
    questions1[3]="\nA for?\n1. Apple\n2. Elephant\n";
    questions1[4]="\nG for?\n1. Goat\n2. Jar\n";
    questions1[5]="\nWhat is the letter before 'B'?\n1. J\n2. A\n";
    questions1[6]="\nWhat is the letter after 'h'?\n1. g\n2. i\n";
    questions1[7]="\n3 X 9 = ?\n1. 32\n2. 27\n";
    questions1[8]="\n5 X 6 = ?\n1. 30\n2. 25\n";
    questions1[9]="\nSpelling of 1 is:\n1. One.\n2. Oan.\n";
    questions1[10]="\nSpelling of 18 is:\n1. Eighteen.\n2. Eitteen.\n";
    questions1[11]="\nWhat is the number Before: 43?\n1. 42\n2. 44\n";
    questions1[12]="\nWhat is the number After: 4?\n1. 5\n2. 3\n";
    questions1[13]="\nWhat is The Capital of Bangladesh:\n1. Dhaka.\n2. Karachi.\n";
    questions1[14]="\nWhat is The Currency of Australia:\n1. Dollar.\n2. Taka.\n";
    questions1[15]="\nWhen is National Victory Day?\n1. 26th, March\n2. 16th, December\n";

    questions2[1]="\"Humpty Dumpty had a great fall\",what is the next line?\n1. Humpty Dumpty sat on a wall,\n2. All the king's horses\n";
    questions2[2]="\"Eating sugar?\",what is the previous line?\n1. Yes papa?\n2. No papa.\n";
    questions2[3]="\nE for?\n1. Ink\n2. Elephant\n";
    questions2[4]="\nP for?\n1. Parrot\n2. Rat\n";
    questions2[5]="\nWhat is the letter before 'e'?\n1. d\n2. f\n";
    questions2[6]="\nWhat is the letter after 'Y'?\n1. Z\n2. X\n";
    questions2[7]="\n4 X 7 = ?\n1. 28\n2. 27\n";
    questions2[8]="\n1 X 8 = ?\n1. 16\n2. 8\n";
    questions2[9]="\nSpelling of 12 is:\n1. Tuelve.\n2. Twelve.\n";
    questions2[10]="\nSpelling of 2 is:\n1. Two.\n2. To.\n";
    questions2[11]="\nWhat is the number Before: 17?\n1. 18\n2. 16\n";
    questions2[12]="\nWhat is the number After: 22?\n1. 21\n2. 23\n";
    questions2[13]="\nWhat is The Capital of United states of America:\n1. Dhaka.\n2. Washington, D.C.\n";
    questions2[14]="\nWhat is The Currency of Bangladesh:\n1. Rupee.\n2. Taka.\n";
    questions2[15]="\nWhat is the color of National Flag?\n1. Red and Green\n2. Red and White\n";

    questions3[1]="\"Come again another day\",what is the next line?\n1. Little Arthur wants to play.\n2. Rain, rain, go away\n";
    questions3[2]="\"Humpty Dumpty had a great fall\",what is the previous line?\n1. Humpty Dumpty sat on a wall,\n2. All the king's horses\n";
    questions3[3]="\nO for?\n1. Owl\n2. Umbrella\n";
    questions3[4]="\nK for?\n1. Kite\n2. Cat\n";
    questions3[5]="\nWhat is the letter before 'p'?\n1. q\n2. o\n";
    questions3[6]="\nWhat is the letter after 'U'?\n1. V\n2. T\n";
    questions3[7]="\n2 X 7 = ?\n1. 14\n2. 23\n";
    questions3[8]="\n5 X 4 = ?\n1. 33\n2. 20\n";
    questions3[9]="\nSpelling of 17 is:\n1. Seventeen.\n2. Seaventeen.\n";
    questions3[10]="\nSpelling of 15 is:\n1. Fifteen.\n2. Fifthteen.\n";
    questions3[11]="\nWhat is the number Before: 23?\n1. 22\n2. 24\n";
    questions3[12]="\nWhat is the number After: 32?\n1. 33\n2. 31\n";
    questions3[13]="\nWhat is The Capital of Nepal:\n1. London.\n2. Kathmandu.\n";
    questions3[14]="\nWhat is The Currency of Maldives:\n1. Rupee.\n2. Rufiyaa.\n";
    questions3[15]="\nWhat is the National Animal?\n1. Tiger\n2. Lion\n";

    questions4[1]="\"Eating sugar?\",what is the next line?\n1. Yes papa?\n2. No papa.\n";
    questions4[2]="\"Have you any wool?\",what is the previous line?\n1. Baa, baa, black sheep,\n2. Yes, sir, yes, sir,\n";
    questions4[3]="\nZ for?\n1. Zoo\n2. Goat\n";
    questions4[4]="\nW for?\n1. Wolf\n2. Yo-Yo\n";
    questions4[5]="\nWhat is the letter before 'K'?\n1. L\n2. J\n";
    questions4[6]="\nWhat is the letter after 'q'?\n1. r\n2. p\n";
    questions4[7]="\n7 X 4 = ?\n1. 36\n2. 28\n";
    questions4[8]="\n8 X 5 = ?\n1. 40\n2. 60\n";
    questions4[9]="\nSpelling of 8 is:\n1. Eight.\n2. Ait.\n";
    questions4[10]="\nSpelling of 19 is:\n1. Nineteen.\n2. Nainteen.\n";
    questions4[11]="\nWhat is the number Before: 36?\n1. 37\n2. 35\n";
    questions4[12]="\nWhat is the number After: 49?\n1. 50\n2. 48\n";
    questions4[13]="\nWhat is The Capital of United Kingdom:\n1. Thimpu.\n2. London.\n";
    questions4[14]="\nWhat is The Currency of Pakistan:\n1. Rupee.\n2. Rufiyaa.\n";
    questions4[15]="\nWhat is the National Flower?\n1. Tulip\n2. Water Lily\n";

    questions5[1]="\"One named Peter, one named Paul.\",what is the next line?\n1. Two little black birds sitting on a wall\n2. Fly away Peter! Fly away Paul!";
    questions5[2]="\"Up above the world so high\",what is the previous line?\n1. Like a diamond in the sky.\n2. How I wonder what you are!\n";
    questions5[3]="\nF for?\n1. Frog\n2. Hat\n";
    questions5[4]="\nS for?\n1. X-ray\n2. Sun\n";
    questions5[5]="\nWhat is the letter before 'd'?\n1. c\n2. e\n";
    questions5[6]="\nWhat is the letter after 'M'?\n1. N\n2. L\n";
    questions5[7]="\n8 X 6 = ?\n1. 48\n2. 63\n";
    questions5[8]="\n5 X 5 = ?\n1. 36\n2. 25\n";
    questions5[9]="\nSpelling of 11 is:\n1. Leven.\n2. Eleven.\n";
    questions5[10]="\nSpelling of 16 is:\n1. Sixteen.\n2. Six.\n";
    questions5[11]="\nWhat is the number Before: 5?\n1. 4\n2. 6\n";
    questions5[12]="\nWhat is the number After: 16?\n1. 15\n2. 17\n";
    questions5[13]="\nWhat is The Capital of Canada:\n1. New Delhi.\n2. Ottawa.\n";
    questions5[14]="\nWhat is The Currency of Bhutan:\n1. Ngultrum.\n2. Rufiyaa.\n";
    questions5[15]="\nWhat is the National Fruit?\n1. Mango\n2. Jack Fruit\n";


    return;
}

int math(int choice)
{
    int i,table;

    if(choice==1){
        system("CLS");
        printf("\nNumbers:\n");
        for(i=1;i<=100;i++){
            printf("%4d",i);
            if(i%10==0){
                printf("\n");
            }
        }
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==2){
        system("CLS");
        printf("\nTable of:");
        scanf("%d",&table);
        for(i=1;i<=10;i++){
            printf("%3d X %2d = %4d\n",table,i,i*table);
        }
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==3){
        system("CLS");
        printf("\nSpelling:\n");
        struct mathspell *current;
        current=mathhead;
        for(i=1;i<=20;i++){
            printf("%2d = %s\n",i,current->numspell);
            current=current->mnext;
        }
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==4){
        system("CLS");
        return 1;
    }
    else{
        system("CLS");
        printf("\nInvalid Input\n");
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    return 0;
}

int english(int choice)
{
    int i;
    if(choice==1){
        while(1){
          system("CLS");
          printf("\n=>LETTERS:\n\n1. Capital Letters\n2. Small Letters\n3. Back\n\nMake Your Choice\n");
            scanf("%d",&choice);
            if(choice==1){
                system("CLS");
                printf("\nCapital Letters:\n");
                for(i=0;i<26;i++){
                    if(i%5==0&&i!=25)printf("\n");
                    printf("%c  ",'A'+i);
                }
                printf("\n");
                while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
                }
            }
            else if(choice==2){
                system("CLS");
                printf("\nSmall Letters:\n");
                for(i=0;i<26;i++){
                    if(i%5==0&&i!=25)printf("\n");
                    printf("%c  ",'a'+i);
                }
                printf("\n");
                while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
                }
            }
            else if(choice==3){
                system("CLS");
                break;
            }
            else{
                system("CLS");
                printf("\nInvalid Input\n");
                while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
                }
            }
        }
    }
    else if(choice==2){
            system("CLS");
            struct englishwords *current;
            current=englishhead;
            printf("\n*Words:\n\n");
            for(i=0;i<26;i++){
                printf("%c for %s\n",('A'+i),current->word);
                current=current->enext;
            }
            while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==3){
            i=0;
            while(i!=8){
                system("CLS");
                printf("\n*Poems:\n1.Twinkle, Twinkle, Little Star.\n2.Baa, baa, black sheep.\n3.Humpty Dumpty.\n4.Early to bed.\n5.Two little black birds.\n6.Johny, Johny.\n7.Rain, rain, go away.\n8.back.\n\n");
                scanf("%d",&i);
                system("CLS");
                if(i>=1&&i<=7){
                    cout<<poems[i]<<endl;
                }

                while(i>=1&&i<=7){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
                }
                while(i>8||i<1){
                    printf("\nInvalid Input\n");
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1)break;
                }
            }

    }
    else if(choice==4){
        return 1;
    }
    else{
        printf("\nInvalid Input\n");
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
        }
    }
    return 0;
}

int generalknowledge(int choice)
{
    struct GK *current,*newnode;
    int i;
    current=GKhead;
    if(choice==1){
        system("CLS");
        for(i=1;i<=10;i++){
            printf("Capital of %s is %s.\n",current->countryname,current->capitals);
            current=current->gknext;
        }
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==2){
        system("CLS");
        for(i=1;i<=10;i++){
            printf("Currency of %s is %s.\n",current->countryname,current->coins);
            current=current->gknext;
        }
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==3){
            system("CLS");
         for(i=0;i<=15;i++){
            cout<<abtc[i]<<endl;
        }
        cout<<endl;
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==4){
        system("CLS");
        return 1;
    }
    else{
        printf("Invalid Input.\n");
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    return 0;
}

int exam(int choice)
{
    double ans;
    int i,x;
    system("CLS");
    if(choice==1){
            ans=0;
        for(i=1;i<=15;i++){
            cout<<questions1[i]<<endl;
            scanf("%d",&x);
            if(x==ansstore1[i]){
                ans=ans+1;
            }
        }
        printf("\nMarks: %.0lf\nPercentage: %.2lf%%\n",ans,(ans/15.0)*100);
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==2){
        ans=0;
        for(i=1;i<=15;i++){
            cout<<questions2[i]<<endl;
            scanf("%d",&x);
            if(x==ansstore2[i]){
                ans=ans+1;
            }
        }
        printf("\nMarks: %.0lf\nPercentage: %.2lf%%\n",ans,(ans/15.0)*100);
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==3){
        ans=0;
        for(i=1;i<=15;i++){
            cout<<questions3[i]<<endl;
            scanf("%d",&x);
            if(x==ansstore3[i]){
                ans=ans+1;
            }
        }
        printf("\nMarks: %.0lf\nPercentage: %.2lf%%\n",ans,(ans/15.0)*100);
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==4){
        ans=0;
        for(i=1;i<=15;i++){
            cout<<questions4[i]<<endl;
            scanf("%d",&x);
            if(x==ansstore4[i]){
                ans=ans+1;
            }
        }
        printf("\nMarks: %.0lf\nPercentage: %.2lf%%\n",ans,(ans/15.0)*100);
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==5){
        ans=0;
        for(i=1;i<=15;i++){
            cout<<questions5[i]<<endl;
            scanf("%d",&x);
            if(x==ansstore5[i]){
                ans=ans+1;
            }
        }
        printf("\nMarks: %.0lf\nPercentage: %.2lf%%\n",ans,(ans/15.0)*100);
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
    }
    else if(choice==6){
        system("CLS");
        return 1;
    }
    else{
        printf("Invalid Input.\n");
        while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
        }
    }
    return 0;
}

int main()
{
    mathstore();
    englishstore();
    gkstore();
    xmstore();
    printf("\n# Welcome to KIDS LEARNING APP #\n\n");
    system("PAUSE");
    int choice;
    while(1){
        system("CLS");

        system("COLOR 1E");
        printf("\n# KIDS LEARNING APP #\n\n1.English.\n2. Maths.\n3. General Knowledge.\n4. Exam\n5. Exit.\n\nMake Your Choice:\n");
        scanf("%d",&choice);
        if(choice==1){
            while(1){
                system("CLS");
                printf("\n*ENGLISH:\n\n1. Letters\n2. Words\n3. Poems\n4. Back\n\nMake Your Choice:\n");
                scanf("%d",&choice);
                if(english(choice)){
                    break;
                }
            }
        }
        else if(choice==2){
            while(1){
                system("CLS");
                printf("\n*MATHS:\n\n1. Numbers: 1-100\n2. Table.\n3. Spelling: 1-20\n4. Back\n\nMake Your Choice:\n");
                scanf("%d",&choice);
                if(math(choice)){
                    break;
                }
            }
        }
        else if(choice==3){
            while(1){
                system("CLS");
                printf("\n*GENERAL KNOWLEDGE:\n\n1. Capitals.\n2. Currency.\n3. About The Country.\n4. Back\n\nMake Your Choice:\n");
                scanf("%d",&choice);
                if(generalknowledge(choice)){
                    break;
                }
            }

        }
        else if(choice==4){
            while(1){
                system("CLS");
                printf("\n*EXAMS:\n\n1. Exam - 1.\n2. Exam - 2.\n3. Exam - 3.\n4. Exam - 4.\n5. Exam - 5.\n6. Back\n\nMake Your Choice:\n");
                scanf("%d",&choice);
                if(exam(choice)){
                    break;
                }
            }
        }
        else if(choice==5){
            break;
        }
        else{
            printf("Invalid Input.\n");
            while(1){
                    printf("\nPress 1 to go Back: ");
                    scanf("%d",&choice);
                    if(choice==1){
                        break;
                    }
                    else{
                        printf("\nInvalid Input\n");
                    }
            }
        }

    }
    return 0;
}