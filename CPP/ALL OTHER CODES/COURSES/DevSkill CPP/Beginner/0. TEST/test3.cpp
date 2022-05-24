#include<iostream>
using namespace std;
int main ()
{
    int i = 0;
    int j = 0;
    int var = 0;
    string s1 = "I am a Student";
    cout<<"Given Text: "<<s1<<endl;
    cout<<endl;
    cout<<"Input the value to shift:  ";
    cin>>j;

    for(i = j; i<s1.size(); i = i+j+1) // changed few things here...go to 28 & 29 line 
    {
        int var = (int(s1[i])) + 2;
        // cout << var << endl;  // checked if the var is calculation the right acsii value
        s1[i] = char(var);
        // cout << s1[i] << endl; // again checked if it's inserting what I want
        // getchar(); // used a pause just to slow down the process
    }
    
    for(i = 0; i<s1.size(); i++ ) // agoin changed few things...go to 28 & 29 line
    {
        cout<< s1[i];  //I cm c svudgnt
    }
    cout<<endl;

    cout << "sizeof(s1) : " << sizeof(s1) << endl; // check it
    cout << "s1.size() : " << s1.length() << endl; // check it
}

// I am a student