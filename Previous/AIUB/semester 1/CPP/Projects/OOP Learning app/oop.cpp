#include <iostream>
#include <cctype>
#include <unistd.h>
#include <conio.h>
using namespace std;

// FUNCTION PROTOTYPING START
void preLoader();
bool isNumberM(string m);
bool isNumberN(string n);
bool isNumberO(string o);
// FUNCTION PROTOTYPING END


// CLASS START

class learnOOP{
    int sum;
    public:
        void landing_page();
        void class_object();
        void features();
        void members();
        void function_overloading();
        int add(string a,string b) { sum = stoi(a)+stoi(b); return sum; }
        int add(string x,string y,string z) { sum = stoi(x)+stoi(y)+stoi(z); return sum; }
        
};
// CLASS END 


// MAIN START
int main(){
    preLoader();
    learnOOP ob;
    ob.landing_page();
}
// MAIN END 


// LANDING PAGE START 
void learnOOP::landing_page(){ 
    for (;;)
    {
        system("cls");
        cout << "\n\t:OOP LEARNING APP:";
        cout << "\n\t====================\n";
        cout << "\n\t------------------------------------";
        cout << "\n\t### AUTHOR : MD SHAMIM AHMED ###\n";
        cout << "\t------------------------------------\n";
        cout << "\n\t:LEARN OBJECT ORIENTED PROGRAMMING USING C++:";
        cout << "\n\t--------------------------------------------------";
        cout<<"\n\n\t1. Concept Of Class And Object.\n\n\t2. Features Of OOP.\n\n\
\t3. Private,Public And Protected Members.\n\n\t4. Function Overloading.\
\n\n\t** Enter 0 For Exit.** Enter Your Choice: ";
        string i; cin >> i;
        if(i=="0"){exit(0);                 break;} 
        if(i=="1"){class_object();          break;} 
        if(i=="2"){features();              break;} 
        if(i=="3"){members();               break;} 
        if(i=="4"){function_overloading();  break;}  
    }
               
}
// LANDING PAGE END 


// CLASS AND OBJECT START 

void learnOOP::class_object(){
    for(;;){
        system("cls");
        cout<<"\n\n\t:CONCEPT OF CLASS AND OBJECT:";
        cout<<"\n\t===============================";
        cout<<"\n\n\t1. What is class ?\n\n\t2. Uses of class ?\n\n\t3. General \
Format.\n\n\t4. What is object ?\n\n\t5. Uses of object ?\
\n\n\t6. Press 6 for Main Menu.\n\n\n\t ** Enter Your Choice: ";
        string i;
        cin >> i;
        if(i=="1"){
            system("cls");
            cout<<"\n\n\tCLASS: Class is a user defined data type.It is declr\
ared using class\n\n\tkeyword.The syntax of a class decleration is similar to\
a structure.\n\n\t * Press Any Key To Go To Previous Page *"; getch();
            class_object();           break; 
        }
        if(i=="2"){
            system("cls");
            cout<<"\n\n\tUSES: It is a important features of Object Oriented\
Programming. To\n\n\tdescribe a object we use class. Class is also used to handle\
many operations.\n\n\t* Press Any Key To Go To Previous Page *";    getch();
            class_object();           break; 
        }
        if(i=="3"){
            system("cls");
            cout<<"\n\n\tGeneral Format:\n\n\t class class_name{\n\n\t //\
private function and variable.\n\n\tprivate:\n\n\t //public function and\
variable.\n\n\t}object list;\n\n\t * Press Any Key To Go To Previous Page *"; getch();
            class_object();           break; 
        }
        if(i=="4"){
            system("cls");
            cout<<"\n\n\tOBJECT: Object is a class type variable.It is a\
basic run time entities\n\n\tin an object-oriented system.\n\n\t* Press Any \
Key To Go To Previous Page *";                                                getch();
            class_object();           break; 
        }
        if(i=="5"){
            system("cls");
            cout<<"\n\n\tUSES: Object is an instance of a class. It is used to\
connect with methods\n\n\tof the class using dot(.) operator. Each object of a class\
has its own copy\
\n\n\tof every variable declared within the class.\n\n\t* Press Any Key To Go To Previous Page *";   getch();
            class_object();           break; 
        }
        if(i=="6"){
            system("cls"); 
            landing_page();           break;
        }
    } 
        // getch();
}
// CLASS AND OBJECT END 


// FEATURES START 
void learnOOP::features(){
    for(;;){
        system("cls");
        cout<<"\n\n\t\t:FEATURES OF OOP:";
        cout<<"\n\n\t\t==================";
        cout<<"\n\n\t\t1. Abstruction.\n\n\t\t2. Encapsulation.\n\n\t\t3. Polymorphism.\
\n\n\t\t4. Inheritance.\n\n\t\t5. Dynamic Binding.\n\n\t\t6. Press 6 for Main Menu.\n\n\t\t** Enter Your Choice: ";
        string i;
        cin >> i;
        if(i=="1"){
            system("cls");
            cout<<"\n\n\t:ABSTRUCTION:\n\n\t================\n\n\t\
Abstruction refers to the act of representing essential features\n\n\twithout \
including the background details or explanations.Classes use the concept\n\n\t\
of abstruction and are defined as a list of abstruct attributes as size,\
\n\n\tweight and cost, and functions to operate on these attributes.\n\n\n\t \
 * Press Any Key To Go To Previous Page *";                  getch();
            features();                          break;
        }
        if(i=="2"){
            system("cls");
            cout<<"\n\n\t:ENCAPSULATION:\n\t=================\n\n\t\
Encapsulation is the mechanism that binds together code and the\n\n\tdata it \
manipulates, and keeps both safe from outside interference and misuse. In\n\n\t\
any object the private data and its related function are binded together\
,so\n\n\tthat nothing from outside can directly access these private members\
. Even if one\n\n\tobject cannot access or change the internal state of another\
object of same class.\n\n\tOnly the own methods involving with that object c\
an allowed to access or change\n\n\tits internal state.\n\n\n\t* Press Any Key \
To Go To Previous Page * ";                                  getch();
            features();                          break;
        }
        if(i=="3"){
            system("cls");
            cout<<"\n\n\t:POLYMORPHISM:\n\t================\n\
\n\tThe word polymorphism means having many forms. It is a way to address different\n\n\t'things' \
in same way. 'Poly' means many and 'morphism' means (forms) \n\n\twhich help us to \
assign more than one property.\n\n\tThere are two types of Polymorphism in C++ :- \n\n\t\t-> Function \
overloading (Compile-time polymorphism)\n\n\t\t-> Function overriding (Run-time polymorphism)\n\n\n\t\
* Press Any Key To Go To Previous Page *";    getch();
            features();                          break;
        }
        if(i=="4"){
            system("cls");
            cout<<"\n\n\t:INHERITANCE:\n\t===============\n\
\n\tIn simple terms inheritance means that one class is defined in a way so that \n\t\
it takes on the attributes and behaviours of a different class - normally callled \n\t\
the parent class.\n\n\tTypes of inheritance : \n\n\t\t-> Single level inheritance.\
\n\n\t\t-> Multi level inheritance.\n\n\t\t-> Hierarchical level inheritance.\
\n\n\t\t-> Multiple level inheritance.\n\n\t\t-> Hybrid level inheritance. \n\n\n\t\
* Press Any Key To Go To Previous Page *";    getch();
            features();                          break;
        }
        if(i=="5"){
            system("cls");
            cout<<"\n\n\t:DYNAMIC BINDING:\n\t===================\n\
\n\tIn object oriented programming it is possible to impliment\n\n\tdifferent\
 version of a particular function.But it is not known which version of\n\n\tthat\
 function will call untill runtime.This system is calles dynamic binding.\n\n\t\
There nare two types of binding one is early binding that is not known\n\n\t\
untill compile time and another is late binding that is not known untill \
runtime.\n\n\n\t* Press Any Key To Go To Previous Page *";    getch();
            features();                          break;
        }
        if(i=="6"){
            system("cls");
            landing_page();                          break;
        }       
    }   
}
// FEATURES END 


// MEMBERS START 
void learnOOP::members(){
    for(;;){
        system("cls");
        cout<<"\n\n\t:PRIVATE, PUBLIC AND PROTECTED MEMBERS:";
        cout<<"\n\n\t=========================================";
        cout<<"\n\n\t1. Variables.\n\n\t2. Functions.\n\n\t3. Press 3 for Main \
Menu.\n\n\tEnter Your Choice: "; 
        string i;
        cin >> i; 
        if(i=="1"){
            system("cls");
            cout<<"\n\n\t:PRIVATE, PUBLIC AND PROTECTED VARIABLES:\n\t\
------------------------------------------\n\n\tPrivate variable can be\
 declared defaultly withing using private\n\n\taccess specier. We can not use a p\
rivate variable directly anywhere in the\n\n\tprogram. Public member variable is\
 declared with public access specier. We can use\n\n\tpublic variable directly any\
where in the program. Protected member variable\n\n\tis declared with protected\
 access specier. It like as private member variable. But\n\n\twe can inherite it\
 directly. \n\n\tPress any key to see it's general format: ";
 getch();            system("cls");
            cout << "\n\n\tGeneral Format:";
            cout << "\n\n\t\t class class_name{\n\n\t\t  \
//private variables.\n\n\t\t public:\n\n\t\t  //public variables.\n\n\t\t \
protected:\n\n\t\t  //protected variables.\n\n\t\t};\n\n\n\t * Press Any Key To \
Go To Previous Page *";  getch();
            members();              break;
        }  
        if(i=="2"){
            system("cls");
            cout<<"\n\n\tPRIVATE, PUBLIC AND PROTECTED FUNCTIONS:\n\n\t\
------------------------------------------\n\n\tPrivate functions can be \
declared defaultly withing using private\n\n\taccess specier.We can not use p\
rivate functions directly anywhere in the\n\n\tprogram. Public member function is\
 declared with public access specier. We can use\n\n\tpublic function directly any\
where in the program. Protected member function\n\n\tis declared with protected \
access specier.It like as private member function. But\n\n\twe can inherite it \
directly. \n\n\tPress any key to see it's general format: ";
            getch();            system("cls");
            cout << "\n\n\tGeneral Format:\n\n\t\tclass class_name{\n\n\t\t  \
//private functions.\n\n\t\t public:\n\n\t\t  //public functions.\n\n\t\t \
protected:\n\n\t\t  //protected functions.\n\n\t\t};\n\n\n\t* Press Any Key To \
Go To Previous Page *";  getch();
            members();              break;
        }  
        if(i=="3"){
            system("cls");
            landing_page();         break;
        }  
    }
}
// MEMBERS END


// FUNCTION OVERLOADING START
void learnOOP::function_overloading(){
    for(;;){
        system("cls");
        cout<<"\n\n\t:FUNCTION OVERLOADING:\n\t========================";
        cout<<"\n\n\t1. What is function overloading ?\n\n\t2. Why function \
overloading is used ?\n\n\t3. General format.\n\n\t4. Example ( Real program )\n\n\t5.\
 Press 5 For Main Menu.\n\n\t** Enter Your Choice: ";
        string i;
        cin >> i; 
        if(i=="1"){
            system("cls");
            cout<<"\n\n\tFUNCTION OVERLOADING:\n\t========================\n\n\tFunction overloading is the \
process by which we can use \n\n\tmany functions with a single name where they a\
re different\n\n\tbased on their argument type or argument name. Here return\n\n\t\
type has no effect. It is an important feature of OOP.\n\n\n\t* Press a\
ny Key To Go To Back Page *";                     getch();
            function_overloading();                   break;
        }
        if(i=="2"){
            system("cls");
            cout<<"\n\n\tWHY IT IS USED?\n\t========================\n\n\t\
Sometimes we may need similar type of funtion differenciang only\
\n\n\tfunction parameter type or number of arguments. In such situati\
ion we will use\n\n\tfunction overloading.Besides funtion overloading is widel\
y used to handle class\n\n\tobjects such as overloading constructor function.\n\
\n\n\t* Press Any Key To Go To Previous Page *";      getch();
            function_overloading();                   break;
        }
        if(i=="3"){
            system("cls");
            cout<<"\n\n\tGeneral Format:\n\t========================\n\n\t\treturn_type  function_name(argument_list)\n\n\t\t{\
\n\n\t\t  //body of funtion\n\n\t\t}\n\n\t\treturn_type  same_function_name\
(argument_list)\n\n\t\t{\n\n\t\t  //body of funtion\n\n\t\t}\n\n\t\t  //Defi\
nation of function as many needed.\n\n\n\t * Press Any Key To Go To Previous Page *";    getch();
            function_overloading();                   break;
        }
        if(i=="4"){ 
            for(;;){ start:
             system("cls");
                cout<<"\t  Sample Code:\n\t  ============\n\t\t#include<iostream>\n\t\t\
using namespace std; \n\n\t\tclass learnOOP{\
\n\t\tprivate:\n\t\t   int sum;\n\t\tpublic:\n\t\t\
   int add(int a,int b) { return a+b; }      \n\t\t\
   int add(int x,int y,int z) { return x+y+z; }  \n\t\t\
};										\n\
                                            \n\t\t\
int main(){                                \n\t\t\
  learnOOP ob;                            \n\t\t\
  cout<< \"ob.add(a,b)= \" << add(10,10) << endl;     \n\t\t\
  cout<< \"ob.add(x,y,z)= \" << add(10,10,10) << endl;  \n\t\t\
}";
             cout<<"\n\n\t  ** Enter 1 To Go To Previous Page.\n\t  ** Enter 2 To Run The\
 Program.\n\n\t  **Enter Your Choice: ";
                string i;
                cin >> i;
             if(i=="1"){ function_overloading();                   break; }    
                if(i=="2"){
                    learnOOP ob;
                    for(;;){
                        string m,n;
                        system("cls");
                        cout << "\n\t\tFor ob.add(a,b) -> ";
                        cout << "\n\t\tEnter a & b : ";
                        cin >> m >> n;
                        
                        if(isNumberM(m) && isNumberN(n)){
                            cout<<"\n\t\tOUTPUT\n\t\t-------";
                            cout<<"\n\t\tAfter giving value to the parameter: \n\n";
                            cout<<"\t\tob.add(" << m << "," << n << ")= " << ob.add(m,n) <<endl;
                            cout << "\n\t\t---------------press anything----------------";
                            getch();
                            break;
                        }else cout << "\n\t\tWrong input. Please enter integers. \
\n\t\tPress any key to go back" << endl; getch();
                    }
                    for(;;){
                        string m,n,o;
                        cout << "\n\n\t\tFor ob.add(x,y,z) -> ";
                        cout << "\n\t\tEnter x, y & z : ";
                        cin >> m >> n >> o;
                        if(isNumberM(m) && isNumberN(n) && isNumberO(o)){
                            cout<<"\n\t\tOUTPUT\n\t\t-------";
                            cout<<"\n\n\t\tAfter giving value to the parameter: \n\n";
                            cout<<"\t\tob.add(" << m << "," << n << "," << o << ")= "<< ob.add(m,n,o) <<endl;
                            cout<<"\n\n\t\t* Press Any Key To Go To Previous Page *"; getch();
                            goto start;
                        }else cout << "\n\t\tWrong input. Please enter integers. \
\n\t\tPress any key to go back" << endl; getch();
                    }
                    
             }    
            }
        }
        if(i=="5"){
            system("cls");
            landing_page();                   break;
        }
    }
}
// FUNCTION OVERLOADING END


// OUTSIDE FUNCTIONS 

// PRELOADER START
void preLoader(){
    system("cls");
   string s = "\nShamim is preparing the files for you.\nMeanwhile, you can \
full-screen your terminal\nfor better performance.\n\n         ";
   for(int i=0; i<s.length(); i++){
       usleep(100000);
       cout << s[i];
   }
   int time = 5;
   for(int i=0; i<=5; i++){
      system("cls");
      cout << "\n\n\n\n\tFor better experience:\
      \n\tplease full screen your terminal\n" << endl;
      cout << "\tPlease wait " << time-- << " more seconds";
     cout << "\n\tloading";
   for(int i=0; i<5; i++){
      usleep(190000);
      cout << ">";
  }
  }
}
// PRELOADER END

// BOOLEAN FUNCTION START
bool isNumberM(string m){
    for(int i = 0; i<m.length(); i++){
        if(isdigit(m[i])==true)
            return true;
        return false;
    }
}
bool isNumberN(string n){
    for(int i = 0; i<n.length(); i++){
        if(isdigit(n[i])==true)
            return true;
        return false;
    }
}
bool isNumberO(string o){
    for(int i = 0; i<o.length(); i++){
        if(isdigit(o[i])==true)
            return true;
        return false;
    }
}
// BOOLEAN FUNCTION END