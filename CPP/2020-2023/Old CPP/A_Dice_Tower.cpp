//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }

void solve(){ }

int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    bool possible(true);
    int t,top,bottom;
    cin >> t >> top;
    bottom = 7 - top;
    int a,b;
    while(t--){
        cin >> a >> b;
        if(top == a || top == b || top == 7-a || top == 7 - b){
            possible = false;
        }
        top = 7 - top;
    }
    cout << (possible ? "YES" : "NO") << endl;

}