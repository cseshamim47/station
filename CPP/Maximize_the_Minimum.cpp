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

void f()
{}

int Case;
void solve()
{
    int n,k;
    cin >> n >> k;
    int arr[n];
    map<int,int> mp;
    map<int,int> mb;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        mp[arr[i]]++;
        mb[arr[i]]++;
    }

    int ck = k;
    while(true)
    {
        if(!k) break;   
        auto x = mp.begin();
        while(x->second && k)
        {
            mp[x->first]--;
            k--;
            // cout << "here" << endl;
        }
        if(!mp[x->first])
        mp.erase(x->first);
    }

    

    int ans1 = INT_MAX;
    for(auto x : mp)
    {
        ans1 = min(ans1,x.first);
        // cout << x.first << " ";
    }
    // printf("\n");
    
    int ans2 = INT_MAX;
    sort(arr,arr+n,greater<int>());
    for(int i = 1; i < n && ck; i++,ck--)
    {
        arr[i] = arr[i-1];
    }

    for(int i = 0; i < n; i++)
    {
        ans2 = min(ans2,arr[i]);   
    }

    cout << max(ans1,ans2) << endl;
    

    // cout << max(ans1,ans2) << endl;
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