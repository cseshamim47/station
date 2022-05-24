#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
// #define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

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
void solve() //! saw editorial & code
{
    int i,j,m,n;
    n = in, m = in;

    int arr[n];
    fo(i,n) arr[i] = in;
    int cnt[n]{0};
    int ans = 0;
    fo(i,n)
    {
        if(arr[i] == 1)
        {
            ans++;
            for(int j = max(0,i-m+1); j <= min(n-1,i+m-1); j++)
            {
                cnt[j]++;
            }
        }
    }

    
    fo(i,n)
    {
        if(cnt[i] == 0)
        {
            ans = -1;
            break;
        }
        bool ok = true;
        if(arr[i] == 1)
        for(int j = max(0,i-m+1); j <= min(n-1,i+m-1); j++)
        {
            
            if(cnt[j] == 1)
            {
                ok = false;
                break;   
            }
        }
        if(ok && arr[i])
        {
            ans--;
            for(int j = max(0,i-m+1); j <= min(n-1,i+m-1); j++)
            {
               cnt[j]--;
            }
        }
    }

    // for(auto x : cnt) cout << x << " ";
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}