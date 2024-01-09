#include <bits/stdc++.h>
using namespace std;

const int N = 1e5+100;
int t[100][N];
int it[100][N];
int Log2[N];
int n; 
int p;
void init()
{   

    for(int i = 2; i <= n; i++)  // storing log values
    {
        Log2[i] = Log2[i/2]+1;
    }
    p = Log2[n];

    for(int i = 0; i < n; i++) it[0][i] = i; // init idx 
    
    for(int i = 1; i <= p; i++)  // for max
    {
        for(int j = 0; j+(1<<i) <= n; j++)
        {
            int left = t[i-1][j];
            int right = t[i-1][j+(1<<(i-1))];
            t[i][j] = max(left,right);

            if(left >= right)
            {
                it[i][j] = it[i-1][j];
            }else
            {
                it[i][j] = it[i-1][j+(1<<i-1)];
            }
        }   
    }
}

int idx = -1;
int query(int l, int r) // TC: O(1) 
{
    int len = r-l+1;
    int p = Log2[len];
    int left = t[p][l];
    int right = t[p][r-(1<<p)+1];
    if(left >= right)
    {
        idx = it[p][l];
    }else
    {
        idx = it[p][r-(1<<p)+1];
    }
    return max(left,right);
}

int overlapQuery(int l, int r)
{
    int mx = INT_MIN;
    for(int p = Log2[r-l+1]; l <= r; p = Log2[r-l+1])
    {
        mx = max(mx,t[p][l]);
        l += (1<<p);
    }
    return mx;
}




int main()
{
    cin >> n;
    for(int i = 0; i < n; i++)
    {
        cin >> t[0][i];
    }
    int q;
    cin >> q;
    init();
    while(q--)
    {
        int l, r;
        cin >> l >> r;
        int val = query(l,r);
        cout << "idx : " << idx << endl;
        cout << "val : " << val << endl;
        cout << "overlap : " << overlapQuery(l,r) << endl;
    }

}

/* 
13
4 2 3 7 1 5 3 3 9 6 7 -1 4 
100

*/