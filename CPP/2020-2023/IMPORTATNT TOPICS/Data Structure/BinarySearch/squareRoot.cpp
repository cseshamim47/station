//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-10
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg(a,b) cout << "DBG LN : " << __LINE__ << "->  " << a << "   " << b << endl;
#define w(t) while(t--){ solve(); }

void solve(){ }

double squareRoot(double value){
    int count = 0;
    double left = 0.0, right = value;
    double mid;
    int cnt = 100;
    // while(cnt--){
    while(fabs(left - right) >= eps){
        // dbg(left,right);
        // gch
        mid = (right+left)/2.0;
        if(mid*mid < value) left = mid;
        else right = mid;
        count++;
    }
    cout << count << endl;
    return mid;
}

int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    cls
    double ans;
    cin >> ans;
    ans = squareRoot(ans);
    cout << setprecision(20) << fixed << ans << endl;
    cout << setprecision(8) << fixed << ans * ans << endl;

}