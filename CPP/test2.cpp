#include <bits/stdc++.h>
using namespace std;

int trie[10001*28][2],node;

void insert(int n)
{
    int root = 1;
    for(int i = 27; i >= 0; i--)
    {
        int idx = (1 & (n >> i));
        if(!trie[root][idx])
        {
            trie[root][idx] = node++;
        }
        root = trie[root][idx];
    }
}
int search(int n)
{
    int root = 1;
    int res = 0;
    for(int i = 27; i >= 0; i--)
    {
        int idx = (1 & (n >> i));
        if(trie[root][idx^1])
        {
            res += (1 << i);
            root = trie[root][idx^1];
        }else 
        {
            root = trie[root][idx];
        }
    }
    return res;
}

void solve()
{
    int n, m;
    cin >> n >> m;
    int v[n + 5][m + 5];
    for (int i = 0; i <= n; i++)
    {
        v[i][0] = 0;
    }

    for (int i = 1; i <= n; i++)
    {
        for (int j = 1; j <= m; j++)
        {
            cin >> v[i][j];
            v[i][j] ^= v[i][j - 1];
        }
    }

    int mxor = 0;
    for (int l = 1; l <= m; l++)
    {
        for (int r = l; r <= m; r++)
        {
            memset(trie,0,sizeof trie);
            node = 2;
            int rowXor = 0;
            insert(0);
            for (int i = 1; i <= n; i++)
            {

                rowXor = (rowXor ^ v[i][r] ^ v[i][l - 1]);
                int k = search(rowXor);
                mxor = max(mxor, rowXor);
                mxor = max(mxor, k);
                insert(rowXor);
            }
        }
    }
    cout << mxor << endl;
}

int main()
{
    solve();
}