#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
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

vector<int> f(int n)
{
    vi ans;
    for(int i = 1; i*i <= n; i++)
    {
        if(n%i == 0 && (n/i)==i) 
        {
            ans.push_back(i);
        }else if(n%i == 0)
        {
            ans.push_back(i);
            ans.push_back(n/i);
        }
    }
    return ans;
}

int Case;
void solve()
{
    int i,j,m,n;
    n = in;
    vi v(n);
    map<int,int> mp;
    fo(i,n)
    {
        v[i] = in;
        mp[v[i]]++;
    }
    sort(all(v),greater<int>());

    cout << v[0] << " ";

    fo(i,n)
    {
        if(i == 0) continue;
        if(v[0]%v[i] != 0 || mp[v[i]] == 2)
        {
            cout << v[i] << endl;
            break;
        }

    }

    // vi vv = f(v[0]);

    // fo(i,s(vv))
    // {
    //     mp[vv[i]]--;
    //     if(mp[vv[i]] == 0)
    //     {
    //         // cout << vv[i] << endl;
    //         mp.erase(vv[i]);
    //     }
    // }

    // cout << (--mp.end())->first << endl;


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