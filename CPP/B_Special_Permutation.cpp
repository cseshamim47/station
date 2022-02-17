#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,a,b;
    cin >> n >> a >> b;
    int middle = n/2;
    if((a <= middle && b<=middle) || (a > middle && b > middle)) cout << -1 << endl;
    else
    {
        int cnt = middle-1;
        int cp = a;
        int arr[n+1]={0};
        arr[a] = 1;
        int cn = n;
        vector<int> v;
        vector<int> k;
        vector<int> ans;
        v.push_back(a);
        ans.push_back(a);

        while(cnt--)
        {
            if(n == b || n==a) 
            {
                cnt++;
                n--;
                continue;
            }
            arr[n] = 1;
            v.push_back(n);
            ans.push_back(n);
            n--;
        }
        
        for(int i = 1; i <= cn; i++) 
        {
            if(arr[i] == 0)
            {
                k.push_back(i);
                ans.push_back(i);
            }
        }
        
        sort(v.begin(),v.end());
        sort(k.begin(),k.end());
        if(v[0] != a || k[k.size()-1] != b) cout << -1 << endl;
        else
        {
            for(auto x : ans) cout << x << " ";
            cout << endl;
        }

    }
    
}
// 6 5 4 1 2 3
// 1 2 3 4 5 6

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}