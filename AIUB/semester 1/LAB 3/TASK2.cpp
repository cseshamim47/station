#include <iostream>

using namespace std;

int main()
{

    float Physics=0;
    float Chemistry=0;
    float Biology=0;
    float Maths=0;
    cout << "Input your Physics mark : " ;
    cin >> Physics;
    cout << "Input your Chemistry mark : " ;
    cin >> Chemistry;
    cout << "Input your Biology mark : " ;
    cin >> Biology;
    cout << "Input your Maths mark : " ;
    cin >> Maths;



    if(Physics >= 90 && Physics <= 100){
        cout << "\nPhysics : A+" << endl;
    }else if (Physics >= 85 && Physics < 90){
        cout << "Physics : A" << endl;
    }else if (Physics >= 80 && Physics < 85){
        cout << "Physics : B+" << endl;
    }else if (Physics >= 75 && Physics < 80){
        cout << "Physics : B" << endl;
    }else if (Physics >= 70 && Physics < 75){
        cout << "Physics : C+" << endl;
    }else if (Physics >= 65 && Physics < 70){
        cout << "Physics : C" << endl;
    }else if (Physics >= 60 && Physics < 65){
        cout << "Physics : D+" << endl;
    }else if (Physics >= 50 && Physics < 60){
        cout << "Physics : D" << endl;
    }else {
        cout << "Physics : F" << endl;
    }


    if(Chemistry >= 90 && Chemistry <= 100){
        cout << "Chemistry : A+" << endl;
    }else if (Chemistry >= 85 && Chemistry < 90){
        cout << "Chemistry : A" << endl;
    }else if (Chemistry >= 80 && Chemistry < 85){
        cout << "Chemistry : B+" << endl;
    }else if (Chemistry >= 75 && Chemistry < 80){
        cout << "Chemistry : B" << endl;
    }else if (Chemistry >= 70 && Chemistry < 75){
        cout << "Chemistry : C+" << endl;
    }else if (Chemistry >= 65 && Chemistry < 70){
        cout << "Chemistry : C" << endl;
    }else if (Chemistry >= 60 && Chemistry < 65){
        cout << "Chemistry : D+" << endl;
    }else if (Chemistry >= 50 && Chemistry < 60){
        cout << "Chemistry : D" << endl;
    }else {
        cout << "Chemistry : F" << endl;
    }


    if(Biology >= 90 && Biology <= 100){
        cout << "Biology : A+" << endl;
    }else if (Biology >= 85 && Biology < 90){
        cout << "Biology : A" << endl;
    }else if (Biology >= 80 && Biology < 85){
        cout << "Biology : B+" << endl;
    }else if (Biology >= 75 && Biology < 80){
        cout << "Biology : B" << endl;
    }else if (Biology >= 70 && Biology < 75){
        cout << "Biology : C+" << endl;
    }else if (Biology >= 65 && Biology < 70){
        cout << "Biology : C" << endl;
    }else if (Biology >= 60 && Biology < 65){
        cout << "Biology : D+" << endl;
    }else if (Biology >= 50 && Biology < 60){
        cout << "Biology : D" << endl;
    }else {
        cout << "Biology : F" << endl;
    }

    if(Maths>= 90 && Maths<= 100){
        cout << "Maths: A+" << endl;
    }else if (Maths>= 85 && Maths< 90){
        cout << "Maths: A" << endl;
    }else if (Maths>= 80 && Maths< 85){
        cout << "Maths: B+" << endl;
    }else if (Maths>= 75 && Maths< 80){
        cout << "Maths: B" << endl;
    }else if (Maths>= 70 && Maths< 75){
        cout << "Maths: C+" << endl;
    }else if (Maths>= 65 && Maths< 70){
        cout << "Maths: C" << endl;
    }else if (Maths>= 60 && Maths< 65){
        cout << "Maths: D+" << endl;
    }else if (Maths>= 50 && Maths< 60){
        cout << "Maths: D" << endl;
    }else {
        cout << "Maths: F" << endl;
    }


}

