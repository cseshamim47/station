#include <bits/stdc++.h>
using namespace std;

#define ll long long
#define w(t) while(t--){ solve(); }

void solve(){
  ll cnt = 0;
  int a;
    int b;
    cin >> a >> b;
    int gcd = __gcd(a,b);
    // int root = sqrtf(gcd);
    int i;
    for(i = 1; i*i <= gcd; i++)
    {
        if(a % i == 0 && b % i == 0){
            cnt+=2;
        }
    }
    i--;
    if(i*i == gcd) cnt--;
    
    cout << cnt << "\n";
}

int main()
{
    ios::sync_with_stdio(0);
    cin.tie(0);
    int t;   cin >> t;   w(t);

}