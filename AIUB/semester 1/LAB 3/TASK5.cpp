#include <iostream>

using namespace std;

int main()
{
    int age;
    float Physics;
    float Math;
    float average;
    float sum;
    cout << "Enter you age: ";
    cin >> age ;
    cout << "Enter you Physics mark: ";
    cin >> Physics;
    cout << "Enter you Maths mark: ";
    cin >> Math;
    sum = Math+Physics;
    average = (sum/200) * 100;


    if ( age >= 18 && sum >= 80  ){
        cout << "Admission Confirmed!" << endl;
    }else if (age <= 18) {
        cout << "You're not 18 yet. Try again after few years. Admission canceled!" <<endl;
    }else {
        cout << "You don't have 80% marks in physics or math or in both. Admission canceled!" <<endl;
    }

}




