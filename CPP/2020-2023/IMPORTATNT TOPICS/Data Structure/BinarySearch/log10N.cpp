//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-10
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg cout << "Debug LN : " << __LINE__ << endl;
#define w(t) while(t--){ solve(); }

void solve(){ }


long double log10N(long double N){
    long double p = 1;
    long double left = 0, right = N, mid;
    int cnt = 0;
    int step = 30;
    // while(step--){
    while(fabs(left-right) >= eps){
        // cout << left << " " << right << endl;
        mid = (left+right)/2;
        if(powl(10,mid)>N) right = mid;
        else left = mid; 
        cnt++;
        // cout << mid << endl;
        // gch
    }
    cout << cnt << endl;
    return mid;
}

int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    cls
    long double N;
    cin >> N;
    cout << setprecision(10) << fixed << log10N(N) << endl;


}