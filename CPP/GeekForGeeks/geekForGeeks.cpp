

// { Driver Code Starts
#include <bits/stdc++.h> 
using namespace std; 

 // } Driver Code Ends
class Solution
{   
public:     
    void transpose(vector<vector<int> >& matrix, int n)
    { 
        for(int i = 0; i < n; i++){
            for(int j = 0; j < n; j++){
                int swap = matrix[i][j];
                matrix[j][i] = matrix[]
            }
        } 
    }
};

// { Driver Code Starts.

int main() {
        int n;
        cin>>n;
        vector<vector<int> > matrix(n); 

        for(int i=0; i<n; i++)
        {
            matrix[i].assign(n, 0);
            for( int j=0; j<n; j++)
            {
                cin>>matrix[i][j];
            }
        }

        Solution ob;
        ob.transpose(matrix,n);
        for (int i = 0; i < n; ++i){
            for (int j = 0; j < n; ++j){
                cout<<matrix[i][j]<<" ";
            }
            cout << endl;
        }    

        cout<<endl;
    
    return 0;
}  // } Driver Code Ends