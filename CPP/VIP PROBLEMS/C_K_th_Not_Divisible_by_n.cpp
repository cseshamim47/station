//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg cout << "Debug LN : " << __LINE__ << endl;
#define w(t) while(t--){ solve(); }

void solve(){
    ll ignore,  nth;
    cin >> ignore >> nth;
    ll l = 0, r = 1e18, mid;
    while(r - l > 0){
        mid = l + (r-l)/2;
        if(mid - mid/ignore < nth) l = mid+1;
        else r = mid;
    }
    cout << l << endl;
}

int main()
{
     //        Bismillah
    int t;   cin >> t;   w(t);
    // cls

}