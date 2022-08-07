//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
int cnt;

ll trailing_zeroes(ll x){
    ll five = 5;
    ll ans = 0;
    ll count = 0;
    while(true){
        ans += x/five;
        five *= 5;
        count++;
        if(x/five == 0) break;
    }
    return ans;
}

void solve(){
    int TZ;
    cin >> TZ;
    int L = 0, R = 1e9,mid;
    int flag = 0;
    while(abs(L-mid) > eps){
        mid = L + (R-L)/2;
        int checkTZ = trailing_zeroes(mid);
        if(checkTZ < TZ) L = mid+1;
        else R = mid;
        if(checkTZ == TZ) flag++;
    }
    if(flag)
        cout << "Case " << ++cnt << ": " << L;
    else cout << "Case " << ++cnt << ": impossible";
    printf("\n");

}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    // cls

}