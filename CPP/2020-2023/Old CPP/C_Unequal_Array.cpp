#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    int arr[n];

    for(int i = 0; i < n; i++) cin >> arr[i];

    int j = -1;
    int k = -1;
    int cnt = 0;
    for(int i = 1; i < n; i++)
    {
        if(arr[i]==arr[i-1])
        {
            if(j == -1)
            {
                j = i;
            }
            k = i-1;
            cnt++;
        }
    }
    int ans = k-j;
    if(cnt>1 && !ans) ans++;

    if(ans < 0) ans = 0;
    cout << ans << endl;


}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}