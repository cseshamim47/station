//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;

struct student
{
    string name;
    int roll;
    bool status;
};

bool cmp(student s1,student s2){
    // return s1.roll > s2.roll; // ekhan theke true pathaile swap hobe na
    if(s1.status && !s2.status) return true;
    return false;
}

void studentSort(){
    student s[3];
    s[0]={"shamim",100,false};
    s[1]={"asif",2,true};
    s[2]={"rabbi",38,false};
    sort(s,s+3,cmp);
    for(int i = 0; i < 3; i++){
        cout << s[i].name << "   " << s[i].roll << "   ";
        if(s[i].status) cout << "True\n";
        else cout << "False\n";
    }
}

int main()
{
      //        Bismillah
    
    studentSort();

}