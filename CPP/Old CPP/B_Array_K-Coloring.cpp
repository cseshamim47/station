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
#define int long long
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
void solve()
{
    int i,j,m,n;
    n = in, m = in;
    vector<int> v(n);
    fo(i,n) v[i] = in;

    map<int,int> mp1;
    map<int,int> mp2;
    vector<int> ans;

    // fo(i,m) 
    // {
    //     mp1[v[i]] = i+1; 
    //     ans.push_back(i+1);
    // }

    int mx = 0;
    for(i = 0; i < n; i++)
    {
        mp2[v[i]]++;
        if(mp2[v[i]] <= m)
        {
            ans.push_back(mp2[v[i]]);
            mx = max(mp2[v[i]],mx);
        }else
        {
            cout << "NO" << endl;
            return;
        }
    }
    if(mx < m)
    {
        // int idx = n-1;
        // for(int i = m; i > mx; i--)
        // {
        //     ans[idx] = i;
        //     idx--;
        // }
        map<int,int> nmp;
        fo(i,n)
        {
            if(m == mx) break;
            
            if(nmp[ans[i]] == 0)
            nmp[ans[i]] = 1;
            else
            {
                ans[i] = m--;
            }


        }
    }
    cout << "YES" << endl;
    for(auto x : ans) cout << x << " ";
    printf("\n");

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