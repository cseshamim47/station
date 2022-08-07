#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
// #define int long long
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

vector<int> precom(32770);

void f()
{
    precom[0] = 0;
    for(int i = 1; i <= 32768; i++)
    {
        int op1 = 32768-i;
        int n = i;
        int cnt = 0;
        while(n != 0)
        {
            n = (n*2) % 32768;
            cnt++;
        }
        precom[i] = min(op1,cnt);
        
        for(int j = max(0,(i-16)); j < i; j++)
        {
            precom[j] = min(precom[j],i-j+precom[i]);
        }
    }
}

int Case;
void solve()
{
    int n;
    cin >> n;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        cout << precom[x] << " ";
    }
    printf("\n");
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    f();
    // w(t)
    solve();
}