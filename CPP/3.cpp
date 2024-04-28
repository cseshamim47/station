#include <bits/stdc++.h>
using namespace std;

const int N = 5;
int a[N][N];

int n;

int min_sum(int pos,set<int> s)
{
    if(pos == n) return 0;

    int sum = 1e5;
    for(int j = 0; j < n; j++)
    {
        
        if(s.find(a[pos][j]) != s.end()) continue;

        s.insert(a[pos][j]);
        int ans = min_sum(pos+1,s) + a[pos][j];
        s.erase(a[pos][j]);

        sum = min(sum,ans);
    }

    return sum;
}

int count_way(int pos, set<int> s, int target)
{
    if(pos == n)
    {
        return target == 0;
    }

    int way = 0;
    for(int j = 0; j < n; j++)
    {
        
        if(s.find(a[pos][j]) != s.end()) continue;

        s.insert(a[pos][j]);
        way += count_way(pos+1,s,target-a[pos][j]);
        s.erase(a[pos][j]);
    }

    return way;
}




void solve()
{
    cin >> n;

    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n; j++)
        {
            cin >> a[i][j];
        }
    }
    set<int> s;
    int sum = min_sum(0,s); 
    s.clear();
    if(sum == 1e5) sum = 0;
    int way = count_way(0,s,sum);
    cout << way << " " << sum << endl;
    
}

int32_t main()
{
    //    Bismillah
    int t = 1;
    cin >> t;
    while(t--) solve();
}