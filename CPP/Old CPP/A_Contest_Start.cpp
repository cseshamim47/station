//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }

void solve(){ 
    ll n,x,t,a;
    cin >> n >> x >> t;
    if(x>t){
        cout << 0 << endl; 
        return;
    }
    if(x==t){
        cout << n-1 << endl;
        return;
    }
    a = t/x;
    if(a >= n) cout << n*(n-1)/2 << endl;
    else if(a < n){
        cout << (n-a)*a + (a*(a-1)/2) << endl;
    } 
}

int main()
{
    // cls
    int t;   cin >> t;   w(t);
    

}