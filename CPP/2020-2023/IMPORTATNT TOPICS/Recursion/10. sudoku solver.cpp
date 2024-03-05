#include <bits/stdc++.h>
using namespace std;

const int n = 9;

bool isSafe(int r, int c, int val, int grid[n][n])
{
    int idx = 0;
    int row = 3 * (r/3);
    int col = 3 * (c/3);
    for(int i = 0; i < 3; i++)
    {
        for(int j = 0; j < 3; j++)
        {
            if(grid[idx][c] == val) return false;
            if(grid[r][idx] == val) return false;
            if(grid[row+i][col+j] == val) return false;
            idx++;
        }
    }
    return true;
}

bool solve(int grid[n][n])
{
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            if(grid[i][j] == 0)
            {
                for(int k = 1; k <= 9; k++)
                {
                    if(isSafe(i,j,k,grid))
                    {
                        grid[i][j] = k;
                        if(solve(grid) == true)
                            return true;
                        else grid[i][j] = 0;
                    }
                }
                return false;
            }
        }
    }
    return true;
}

int main()
{
    //    Bismillah
    int grid[n][n] = { { 3, 0, 6, 5, 0, 8, 4, 0, 0 },
                       { 5, 2, 0, 0, 0, 0, 0, 0, 0 },
                       { 0, 8, 7, 0, 0, 0, 0, 3, 1 },
                       { 0, 0, 3, 0, 1, 0, 0, 8, 0 },
                       { 9, 0, 0, 8, 6, 3, 0, 0, 5 },
                       { 0, 5, 0, 0, 9, 0, 6, 0, 0 },
                       { 1, 3, 0, 0, 0, 0, 2, 5, 0 },
                       { 0, 0, 0, 0, 0, 0, 0, 7, 4 },
                       { 0, 0, 5, 2, 0, 6, 3, 0, 0 } };

    if(solve(grid) == true)
    {
        for(int i = 0; i < 9; i++)
        {
            for(int j = 0; j < 9; j++)
            {
                cout << grid[i][j] << " ";
            }
            cout << endl;
        }
    }else cout << "No answer" << endl;


}